<?php
// select có chia page
function getAllSlide($limit, $initial_page)
{
    try {
        $sql = "SELECT * FROM slideshow ORDER BY id DESC LIMIT :limit OFFSET :offset";
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
function selectAllSlide()
{
    try {
        $sql = "SELECT * FROM slideshow ORDER BY id DESC";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}


function getTotalPageSlide()
{
    try {
        $sql = "SELECT COUNT(*) FROM slideshow";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function insertSlide($url, $type)
{
    try {
        $sql = "INSERT INTO slideshow (url, type) VALUES (:url, :type)";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":url", $url);
        $stmt->bindParam(":type", $type);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function selectOneSlide($id)
{
    try {
        $sql = "SELECT * FROM slideshow WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function updateSlide($id, $username, $email, $password, $address, $tel, $image)
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

function deleteSlide($id)
{
    try {
        $sql = "DELETE FROM slideshow WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}
