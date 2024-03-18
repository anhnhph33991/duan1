<?php
// select có chia page
function getAllUser($limit, $initial_page)
{
    try {
        $sql = "SELECT * FROM users ORDER BY id DESC LIMIT :limit OFFSET :offset";
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
function selectAllUser()
{
    try {
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}


function getTotalPageUser()
{
    try {
        $sql = "SELECT COUNT(*) FROM users";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function insertUser($username, $email, $password)
{
    try {
        $sql = "INSERT INTO users (username, email, password) VALUES (:username,:email,:password)";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function selectOneUser($id)
{
    try {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function updateUser($id, $username, $email, $password, $address, $tel, $image)
{
    try {
        $sql = "UPDATE users SET username = :username, email = :email, password = :password, address = :address, tel = :tel, image = :image WHERE id = :id";
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

function validateEmailExists($email)
{
    try {
        $sql = "SELECT COUNT(*) AS count FROM users WHERE email = ?";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function deleteUser($id)
{
    try {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}


function authLogin($email){
    try {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}
