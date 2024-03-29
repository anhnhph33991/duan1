<?php

function getAllCart($idUser)
{
    try {
        $sql = "SELECT * FROM cart WHERE user_id = :user_id ORDER BY id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':user_id', $idUser, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function getCountRowsCart($idUser)
{
    try {
        $sql = "SELECT COUNT(*) FROM cart WHERE user_id = :user_id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':user_id', $idUser, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}


function insertOneCartProduct($nameProduct, $imageProduct, $priceProduct, $idUser, $idProduct, $descriptionProduct, $typeProduct, $cName)
{
    try {
        $sql = "INSERT INTO cart (name, image, price, user_id, product_id, descriptionProduct, typeProduct, cName) VALUES (:name, :image, :price, :user_id, :product_id, :descriptionProduct, :typeProduct, :cName)";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":name", $nameProduct);
        $stmt->bindParam(":image", $imageProduct);
        $stmt->bindParam(":price", $priceProduct);
        $stmt->bindParam(":user_id", $idUser);
        $stmt->bindParam(":product_id", $idProduct);
        $stmt->bindParam(":descriptionProduct", $descriptionProduct);
        $stmt->bindParam(":typeProduct", $typeProduct);
        $stmt->bindParam(":cName", $cName);

        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function updateQtyProduct($idProduct)
{
    try {
        $sql = "UPDATE cart SET qty = qty + 1 WHERE product_id = :product_id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":product_id", $idProduct);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function deleteQtyProduct($idProduct)
{
    try {
        $sql = "DELETE FROM cart WHERE product_id = :product_id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":product_id", $idProduct);
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
