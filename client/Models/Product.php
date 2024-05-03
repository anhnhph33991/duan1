<?php
// select all product - có chia page
function getAllProducts($limit, $initial_page)
{
    try {
        $sql = "SELECT
        p.id as p_id,
        p.name as p_name,
        p.price as p_price,
        p.image as p_image,
        p.description as p_description,
        p.views as p_views,
        p.type as p_type,
        p.status as p_status,
        c.name as c_name,
        c.id as c_id
        FROM products as p
        INNER JOIN category as c
        ON p.id_category = c.id 
        WHERE p.status = 'public'
        ORDER BY p.id DESC
        LIMIT :limit OFFSET :offset";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $initial_page, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

// sub category

function getAllSubCate()
{
    try {
        $sql = "SELECT
        * FROM sub_categorys
        ORDER BY id ";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

// select all product với category - có chia page
function getAllProductWithCategory($limit, $initial_page, $id_category)
{
    try {
        $sql = "SELECT
        p.id as p_id,
        p.name as p_name,
        p.price as p_price,
        p.image as p_image,
        p.description as p_description,
        p.views as p_views,
        p.type as p_type,
        p.status as p_status,
        c.name as c_name,
        c.id as c_id
        FROM products as p
        INNER JOIN category as c
        ON p.id_category = c.id 
        WHERE c.id = :id_category AND p.status = 'public'
        ORDER BY p.id DESC
        LIMIT :limit OFFSET :offset";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $initial_page, PDO::PARAM_INT);
        $stmt->bindParam(':id_category', $id_category, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

// select product with price
function getAllProductWithPrice($limit, $initial_page, $start_price, $end_price)
{
    try {
        $sql = "SELECT
        p.id as p_id,
        p.name as p_name,
        p.price as p_price,
        p.image as p_image,
        p.description as p_description,
        p.views as p_views,
        p.type as p_type,
        p.status as p_status,
        c.name as c_name,
        c.id as c_id
        FROM products as p
        INNER JOIN category as c
        ON p.id_category = c.id 
        WHERE p.price BETWEEN :start_price AND :end_price AND p.status = 'public'
        ORDER BY p.id DESC
        LIMIT :limit OFFSET :offset";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $initial_page, PDO::PARAM_INT);
        $stmt->bindParam(':start_price', $start_price, PDO::PARAM_INT);
        $stmt->bindParam(':end_price', $end_price, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}


// select all product k chia page
function selectAllProducts()
{
    try {
        $sql = "SELECT
        p.id as p_id,
        p.name as p_name,
        p.price as p_price,
        p.image as p_image,
        p.description as p_description,
        p.views as p_views,
        p.type as p_type,
        p.status as p_status,
        c.name as c_name
        FROM products as p
        INNER JOIN category as c
        ON p.id_category = c.id
        WHERE p.status = 'public' 
        ORDER BY p.id DESC";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

// lấy số lượng record tất cả products
function getTotalPageProducts()
{
    try {
        $sql = "SELECT COUNT(*) FROM products WHERE status = 'public'";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

// lấy số lượng record tất cả products theo category
function getTotalPageProductsWithCategory($id_category)
{
    try {
        $sql = "SELECT COUNT(*) FROM products WHERE id_category = :id_category AND status = 'public'";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id_category", $id_category);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

// lấy số lượng record tất cả products theo price
function getTotalPageProductsWithPrice($start_price, $end_price)
{
    try {
        $sql = "SELECT COUNT(*) FROM products WHERE price BETWEEN :start_price AND :end_price AND status = 'public'";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":start_price", $start_price, PDO::PARAM_INT);
        $stmt->bindParam(":end_price", $end_price, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

// search product
function getSearchProduct($name, $limit, $initial_page)
{
    try {
        $keywords = explode('-', $name);
        $keywordConditions = [];
        foreach ($keywords as $keyword) {
            $keywordConditions[] = "p.name LIKE '%$keyword%'";
        }
        $condition = implode(' AND ', $keywordConditions);
        // AND sẽ tìm đúng theo value phải thỏa mãn tất cả mới render
        // OR Tìm theo từng value 
        $sql = "SELECT
            p.id as p_id,
            p.name as p_name,
            p.price as p_price,
            p.image as p_image,
            p.description as p_description,
            p.views as p_views,
            p.type as p_type,
            p.status as p_status,
            c.name as c_name,
            c.id as c_id
            FROM products as p
            INNER JOIN category as c
            ON p.id_category = c.id 
            WHERE p.status = 'public' AND ($condition)
            ORDER BY p.id DESC
            LIMIT :limit OFFSET :offset";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $initial_page, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

// lấy số lượng record tất cả products theo search
function getTotalPageProductsWithSearch($name)
{
    try {
        // handle slug -
        $keywords = explode('-', $name);
        $keywordConditions = [];
        foreach ($keywords as $keyword) {
            $keywordConditions[] = "name LIKE '%$keyword%'";
        }
        $condition = implode(' AND ', $keywordConditions);

        $sql = "SELECT COUNT(*) FROM products WHERE ($condition) AND status = 'public'";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

// select top 10 products

function selectGet8Products()
{
    try {
        $sql = "SELECT
        p.id as p_id,
        p.name as p_name,
        p.price as p_price,
        p.image as p_image,
        p.description as p_description,
        p.views as p_views,
        p.type as p_type,
        p.status as p_status,
        c.name as c_name
        FROM products as p
        INNER JOIN category as c
        ON p.id_category = c.id
        WHERE p.status = 'public' 
        ORDER BY p.id DESC LIMIT 8";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function selectTopProductViews()
{
    try {
        $sql = "SELECT * FROM products ORDER BY views DESC LIMIT 8";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}


// get count record search product
// function getTotalPageProductsWithSearch($id_category)
// {
//     try {
//         $sql = "SELECT * FROM products WHERE name = :name";
//         $stmt = $GLOBALS['connect']->prepare($sql);
//         $stmt->bindParam(":name", $name);
//         $stmt->execute();
//         return $stmt->fetchColumn();
//     } catch (PDOException $e) {
//         die($e->getMessage());
//     }
// }


// Thêm product
function insertOneProduct($name, $price, $image, $description, $id_category)
{
    try {
        $sql = "INSERT INTO products (name, price, image, description, id_category) VALUES (:name, :price, :image, :description, :id_category)";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":id_category", $id_category);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}




function selectOneProduct($id)
{
    try {
        $sql = "SELECT 
        p.id as p_id,
        p.name as p_name,
        p.price as p_price,
        p.image as p_image,
        p.description as p_description,
        p.views as p_views,
        p.type as p_type,
        p.status as p_status,
        p.sub_category_id as p_sub_category_id,
        p.product_type as p_product_type,
        p.qty as p_qty,
        c.name as c_name,
        c.id as c_id
        FROM products as p
        INNER JOIN category as c ON p.id_category = c.id WHERE p.id = :id
        ";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function updateProduct($id, $name, $price, $image, $description, $id_category, $status)
{
    try {
        $sql = "UPDATE products SET name = :name, price = :price, image = :image, description = :description, id_category = :id_category, status = :status WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":id_category", $id_category);
        $stmt->bindParam(":status", $status);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}


// update views

function updateProductView($id, $views)
{
    try {
        $sql = "UPDATE products SET views = :views WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":views", $views);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}


function deleteOneProduct($id)
{
    try {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}


function selectWithColors($variant_type)
{
    try {
        $sql = "SELECT * FROM product_variants WHERE variant_type = :variant_type";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':variant_type', $variant_type);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function selectListImages($product_id)
{
    try {
        $sql = "SELECT * FROM product_images WHERE product_id = :product_id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function selectColorProduct($idProduct, $id)
{
    try {
        $sql = "SELECT * FROM product_variants WHERE variant_type = :variant_type AND product_id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':variant_type', $idProduct);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function selectSizeProduct($idProduct, $id)
{
    try {
        $sql = "SELECT * FROM product_variants WHERE variant_type = :variant_type AND product_id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':variant_type', $idProduct);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}


function selectProductWithCategory($id_category)
{
    try {
        $sql = "SELECT * FROM products WHERE id_category = :id_category AND status = 'public' LIMIT 10";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':id_category', $id_category, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}
