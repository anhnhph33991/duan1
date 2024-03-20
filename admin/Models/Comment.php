<?php
// select có chia page
function getAllComment($limit, $initial_page)
{
    try {
        $sql = "SELECT
        comments.id AS comment_id,
        comments.content AS comment_content,
        comments.image AS comment_image,
        comments.stars AS comment_stars,
        users.username AS user_name,
        users.image AS user_image,
        products.name AS product_name,
        comments.time_comment AS comment_time_comment
    FROM
        comments
    INNER JOIN
        users ON comments.id_user = users.id
    INNER JOIN
        products ON comments.id_product = products.id
    ORDER BY comments.id DESC    
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
// select k chia page
function selectAllComment()
{
    try {
        $sql = "SELECT
        comments.id AS comment_id,
        comments.content AS comment_content,
        users.username AS user_name,
        users.image AS user_image,
        products.name AS product_name,
        comments.time_comment AS comment_time_comment
    FROM
        comments
    INNER JOIN
        users ON comments.id_user = users.id
    INNER JOIN
        products ON comments.id_product = products.id
    ORDER BY comments.id DESC";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
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
        $sql = "SELECT
        comments.id AS comment_id,
        comments.content AS comment_content,
        comments.image AS comment_image,
        comments.stars AS comment_stars,
        users.username AS user_name,
        users.image AS user_image,
        products.name AS product_name,
        products.image AS product_image,
        comments.time_comment AS comment_time_comment
    FROM
        comments
    INNER JOIN
        users ON comments.id_user = users.id
    INNER JOIN
        products ON comments.id_product = products.id
    WHERE comments.id = :id
    ORDER BY comments.id DESC";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
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
