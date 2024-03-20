<?php
// select có chia page
function getAllCategory($limit, $initial_page)
{
    try {
        $sql = "SELECT * FROM category ORDER BY id DESC LIMIT :limit OFFSET :offset";
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
function selectAllCategory()
{
    try {
        $sql = "SELECT * FROM category ORDER BY id DESC";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}


function getTotalPageCategory()
{
    try {
        $sql = "SELECT COUNT(*) FROM category";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function insertCategory($name, $slug, $image)
{
    try {
        $sql = "INSERT INTO category (name, slug, image) VALUES (:name, :slug, :image)";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":slug", $slug);
        $stmt->bindParam(":image", $image);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function selectOneCategory($id)
{
    try {
        $sql = "SELECT * FROM category WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function updateCategory($id, $name)
{
    try {
        $sql = "UPDATE category SET name = :name WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function deleteCategory($id)
{
    try {
        $sql = "DELETE FROM category WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}
