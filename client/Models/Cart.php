<?php

function getAllCart($idUser)
{
    try {
        $sql = "SELECT * FROM cart WHERE user_id = :user_id AND status = 'notSold' ORDER BY id";
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
        $sql = "SELECT COUNT(*) FROM cart WHERE user_id = :user_id AND status = 'notSold'";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':user_id', $idUser, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}


function insertOneCartProduct($nameProduct, $imageProduct, $priceProduct, $idUser, $idProduct, $descriptionProduct, $typeProduct, $cName, $qty)
{
    try {
        $sql = "INSERT INTO cart (name, image, price, user_id, product_id, descriptionProduct, typeProduct, cName, qty) VALUES (:name, :image, :price, :user_id, :product_id, :descriptionProduct, :typeProduct, :cName, :qty)";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":name", $nameProduct);
        $stmt->bindParam(":image", $imageProduct);
        $stmt->bindParam(":price", $priceProduct);
        $stmt->bindParam(":user_id", $idUser);
        $stmt->bindParam(":product_id", $idProduct);
        $stmt->bindParam(":descriptionProduct", $descriptionProduct);
        $stmt->bindParam(":typeProduct", $typeProduct);
        $stmt->bindParam(":cName", $cName);
        $stmt->bindParam(":qty", $qty);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function updateQtyProduct($idProduct, $qtyProduct, $idUser)
{
    try {
        $sql = "UPDATE cart SET qty = :qty_product WHERE product_id = :product_id AND user_id = :user_id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":qty_product", $qtyProduct);
        $stmt->bindParam(":product_id", $idProduct);
        $stmt->bindParam(":user_id", $idUser);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function deleteQtyProduct($idProduct, $idUser)
{
    try {
        $sql = "DELETE FROM cart WHERE product_id = :product_id AND user_id = :user_id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":product_id", $idProduct);
        $stmt->bindParam(":user_id", $idUser);
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



// 
function checkProductCart($userId, $productId)
{
    try {
        $sql = "SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        return $stmt->rowCount();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function getQtyProduct($idProduct, $idUser)
{
    try {
        $sql = "SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':user_id', $idUser);
        $stmt->bindParam(':product_id', $idProduct);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result ? $result['qty'] : 0;
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

// update status cart
// function updateStatusCart($idProduct, $status)
// {
//     try {

//         $expId = explode(',', $idProduct);
//         $condition = rtrim(str_repeat('?,', count($expId)), ',');

//         $sql = "UPDATE cart SET status = :status WHERE id IN $condition";
//         $stmt = $GLOBALS['connect']->prepare($sql);
//         foreach ($expId as $key => $id) {
//             $stmt->bindValue(($key + 1), $id, PDO::PARAM_INT);
//         }
//         $stmt->bindParam(':status', $status);
//         $stmt->execute();
//     } catch (PDOException $e) {
//         debug($e->getMessage());
//     }
// }

function updateStatusCart($idProduct, $status){
    try {
        $explodeId = explode(',', $idProduct);
        $placeholders = rtrim(str_repeat('?,', count($explodeId)), ','); // Tạo chuỗi placeholders (?)

        $sql = "UPDATE cart SET status = ? WHERE id IN ($placeholders)";
        $stmt = $GLOBALS['connect']->prepare($sql);

        // Bind giá trị cho placeholders (?)
        $stmt->bindValue(1, $status);
        foreach ($explodeId as $key => $id) {
            $stmt->bindValue(($key + 2), $id, PDO::PARAM_INT); // Bắt đầu từ 2 vì status đã được bind ở vị trí 1
        }

        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}


