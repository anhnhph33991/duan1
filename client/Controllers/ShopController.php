<?php

require_once MODELS . 'Category.php';
require_once MODELS . 'Product.php';

function shopIndex()
{
    $title = 'Shop';
    $view = 'shop';
    $script = 'shop';

    $dataCategory = selectAllCategory();
    // $dataProduct = selectAllProducts();

    $page = $GLOBALS['page'];
    $limit = 12;
    $initial_page = ($page - 1) * $limit;
    $dataProduct = getAllProducts($limit, $initial_page);
    $total_rows = getTotalPageProducts();
    $total_pages = ceil($total_rows / $limit);


    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        echo $category;
    }


    require_once VIEW . 'layouts/master.php';
}

function detailProduct()
{
    $title = 'Detail Product';
    $view = 'product-detail';
    $script = 'detailProduct';
    $components = 'detail-product';
    $product = selectOneProduct($_GET['id'] ?? null);




    require_once VIEW . 'layouts/master.php';
}
