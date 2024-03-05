<?php
// Require filde core
require_once "./core/env.php";
require_once "./core/helper.php";
require_once "./core/connect.php";
// Require controllers
require_once CONTROLLER . 'HomeController.php';

$act = $_GET['act'] ?? '/';

match($act){
    '/' => homeIndex(),
};




require_once "./Core/disconnect.php";

?>