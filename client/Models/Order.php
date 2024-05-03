<?php
// select có chia page
function getAllOrder($limit, $initial_page)
{
    try {
        $sql = "SELECT * FROM orders ORDER BY id DESC LIMIT :limit OFFSET :offset";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindParam(":offset", $initial_page, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}
// select k chia page
function selectAllOrder()
{
    try {
        $sql = "SELECT * FROM orders ORDER BY id DESC";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}


function getTotalPageOrder()
{
    try {
        $sql = "SELECT COUNT(*) FROM orders";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function insertOrder($payment, $address, $status, $total_amount, $idProduct, $timeAt, $codeAt, $username)
{
    try {
        $sql = "INSERT INTO orders (payments, address, status, total_amount, idProduct_cart, time_at, code_order, username) VALUES (:payments, :address, :status, :total_amount, :idProduct_cart, :time_at,:code_order, :username)";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":payments", $payment);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":total_amount", $total_amount);
        $stmt->bindParam(":idProduct_cart", $idProduct);
        $stmt->bindParam(":time_at", $timeAt);
        $stmt->bindParam(":code_order", $codeAt);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function selectOneOrder($username)
{
    try {
        $sql = "SELECT * FROM orders WHERE username = :username";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

// function show order
function showOrder($id, $listIdProduct)
{
    try {
        $sql = "SELECT orders.id, orders.payments, orders.address, orders.status, orders.total_amount, orders.time_at, orders.code_order, orders.username, cart.image, cart.name, cart.price, cart.qty 
        FROM orders
        INNER JOIN cart
        ON FIND_IN_SET(cart.id, orders.idProduct_cart) AND cart.id IN ($listIdProduct)
        WHERE orders.id = $id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function selectOrderWithId($id)
{
    try {
        $sql = "SELECT * FROM orders WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function selectCodeOrder($codeOrder)
{
    try {
        $sql = "SELECT * FROM orders WHERE code_order = :code_order";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":code_order", $codeOrder);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function updateOrder($id, $username, $email, $password, $address, $tel, $image)
{
    try {
        $sql = "UPDATE slideshow SET username = :username, email = :email, password = :password, address = :address, tel = :tel, image = :image WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":tel", $tel);
        $stmt->bindParam(":image", $image);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

// function validateEmailExists($email)
// {
//     try {
//         $sql = "SELECT COUNT(*) AS count FROM slideshow WHERE email = ?";
//         $stmt = $GLOBALS['connect']->prepare($sql);
//         $stmt->execute([$email]);
//         $result = $stmt->fetch(PDO::FETCH_ASSOC);
//         return $result['count'] > 0;
//     } catch (PDOException $e) {
//         die($e->getMessage());
//     }
// }

function deleteOrder($id)
{
    try {
        $sql = "DELETE FROM orders WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}
