<?php
session_start();
ob_start();
// Require file core
// require_once "../vendor/autoload.php";
require_once "../core/env.php";
require_once "../core/helper.php";
require_once "../core/connect.php";
// require_once "../core/configCloudinary.php";
// Require controllers
require_once CONTROLLER_ADMIN . 'DashboardController.php';
require_once CONTROLLER_ADMIN . 'ProductController.php';
require_once CONTROLLER_ADMIN . 'CategoryController.php';
require_once CONTROLLER_ADMIN . 'UserController.php';
require_once CONTROLLER_ADMIN . 'CommentController.php';
require_once CONTROLLER_ADMIN . 'OrderController.php';
require_once CONTROLLER_ADMIN . 'VoucherController.php';
require_once CONTROLLER_ADMIN . 'SlideShowController.php';

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
    // // route category
    'categorys' => categoryIndex(),
    'add-category' => categoryCreate(),
    'update-category' => categoryUpdate(),
    'show-category' => categoryShow(),
    'delete-category' => categoryDelete(),
    // // route user
    'users' => userIndex(),
    'add-user' => userCreate(),
    'update-user' => userUpdate(),
    'show-user' => userShow(),
    'delete-user' => userDelete(),
    // // route comment
    'comments' => commentIndex(),
    'update-comment' => commentUpdate(),
    'show-comment' => commentShow(),
    'delete-comment' => commentDelete(),
    // // route orders
    'orders' => orderIndex(),
    'show-order' => orderShow(),
    'update-order' => orderUpdate(),
    'delete-order' => orderDelete(),
    // // route voucher
    'vouchers' => voucherIndex(),
    'add-voucher' => voucherCreate(),
    'update-voucher' => voucherUpdate(),
    'delete-voucher' => voucherDelete(),
    // route slide
    'slides' => slideIndex(),
    'create-slides' => slideCreate(),
    'update-slides' => slideUpdate(),
    'delete-slides' => slideDelete(),
    'show-slides' => slideShow(),

    // route test
    'upload-image' => craeteImage(),
    'table_upload' => ImageIndeexTest(),
    'delete-image' => deleteImage(),
        // 404
    default => require_once VIEW_ADMIN . 'layouts/404.php',
};


require_once "../Core/disconnect.php";
