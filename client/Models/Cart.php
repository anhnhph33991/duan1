<?php

// function getAllProducts($limit, $initial_page)
// {
//     try {
//         $sql = "SELECT
//         p.id as p_id,
//         p.name as p_name,
//         p.price as p_price,
//         p.image as p_image,
//         p.description as p_description,
//         p.views as p_views,
//         p.type as p_type,
//         p.status as p_status,
//         c.name as c_name,
//         c.id as c_id
//         FROM products as p
//         INNER JOIN category as c
//         ON p.id_category = c.id 
//         WHERE p.status = 'public'
//         ORDER BY p.id DESC
//         LIMIT :limit OFFSET :offset";
//         $stmt = $GLOBALS['connect']->prepare($sql);
//         $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
//         $stmt->bindParam(':offset', $initial_page, PDO::PARAM_INT);
//         $stmt->execute();
//         $result = $stmt->fetchAll();
//         return $result;
//     } catch (PDOException $e) {
//         die($e->getMessage());
//     }
// }

// sub_category

function getAllCart()
{
    try {
        $sql = "SELECT
        * FROM cart
        ORDER BY id ";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}


function insertOneCartProduct($name, $image, $price, $user_id, $product_id)
{
    try {
        $sql = "INSERT INTO products (name, image, price, user_id, product_id) VALUES (:name, :image, :price, :user_id, :product_id)";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":product_id", $product_id);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}


function selectOneProductCart($id)
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

function updateProductCart($id, $name, $image, $price, $user_id, $product_id)
{
    try {
        $sql = "UPDATE products SET name = :name, image = :image, price = :price, user_id = :user_id, product_id = :product_id WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":product_id", $product_id);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}


function deleteOneProductCart($id)
{
    try {
        $sql = "DELETE FROM cart WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}
