<?php

function getAllCategory(){
    try {
        $sql = "SELECT * FROM category ORDER BY id DESC";
        $stmt = $GLOBALS['connect']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        debug($e->getMessage());
    }
}


?>