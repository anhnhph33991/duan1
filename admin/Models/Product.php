<?php

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
        c.name as c_name
        FROM products as p
        INNER JOIN category as c
        ON p.id_category = c.id ORDER BY p.id DESC
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
        ON p.id_category = c.id ORDER BY p.id DESC";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}


function getTotalPageProducts()
{
    try {
        $sql = "SELECT COUNT(*) FROM products";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

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



