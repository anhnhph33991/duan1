<?php
session_start();
ob_start();
// Require filde core
require_once "../core/env.php";
require_once "../core/helper.php";
require_once "../core/connect.php";
// Require controllers
require_once CONTROLLER_ADMIN . 'DashboardController.php';
require_once CONTROLLER_ADMIN . 'ProductController.php';


// Handle Routes
$act = $_GET['act'] ?? '/';
$page = $_GET['page'] ?? 1;

match ($act) {
    '/' => dashboardIndex(),
    // route product
    'products' => productIndex(),
    'add-product' => productCreate(),
    'update-product' => productUpdate(),
    'show-product' => productShow(),
    'delete-product' => productDelete(),
    default => require_once VIEW_ADMIN . 'layouts/404.php',
};






require_once "../Core/disconnect.php";
