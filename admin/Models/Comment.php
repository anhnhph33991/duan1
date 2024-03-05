<?php
// select có chia page
function getAllComment($limit, $initial_page)
{
    try {
        $sql = "SELECT * FROM comments ORDER BY id DESC LIMIT :limit OFFSET :offset";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":limit", $limit);
        $stmt->bindParam(":offset", $initial_page);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}
// select k chia page
function selectAllComment()
{
    try {
        $sql = "SELECT * FROM comments ORDER BY id DESC";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}


function getTotalPageComment()
{
    try {
        $sql = "SELECT COUNT(*) FROM comments";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function selectOneComment($id)
{
    try {
        $sql = "SELECT * FROM comments WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function updateComment($id, $content)
{
    try {
        $sql = "UPDATE comments SET content = :content WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":content", $content);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}

function deleteComment($id)
{
    try {
        $sql = "DELETE FROM comments WHERE id = :id";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}
