<?php
// select có chia page
function getAllVoucher($limit, $initial_page)
{
    try {
        $sql = "SELECT * FROM vouchers ORDER BY id DESC LIMIT :limit OFFSET :offset";
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
function selectAllVoucher()
{
    try {
        $sql = "SELECT * FROM vouchers ORDER BY id DESC";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}


function getTotalPageVoucher()
{
    try {
        $sql = "SELECT COUNT(*) FROM vouchers";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function insertVoucher($code, $value, $desc, $qty, $time_create)
{
    try {
        $sql = "INSERT INTO vouchers (voucher_code, value, voucher_desc, qty, time_create) VALUES (:voucher_code,:value,:voucher_desc,:qty,:time_create)";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":voucher_code", $code);
        $stmt->bindParam(":value", $value);
        $stmt->bindParam(":voucher_desc", $desc);
        $stmt->bindParam(":qty", $qty);
        $stmt->bindParam(":time_create", $time_create);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function selectOneVoucher($id)
{
    try {
        $sql = "SELECT * FROM vouchers WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function updateVoucher($id, $username, $email, $password, $address, $tel, $image)
{
    try {
        $sql = "UPDATE vouchers SET username = :username, email = :email, password = :password, address = :address, tel = :tel, image = :image WHERE id = :id";
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

function deleteVoucher($id)
{
    try {
        $sql = "DELETE FROM vouchers WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}
