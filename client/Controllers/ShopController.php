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

    $page = $GLOBALS['page'] ?? 1;
    $limit = 12;
    $initial_page = ($page - 1) * $limit;
    $dataProduct = []; // khởi tạo biến chứa data
    $total_rows = 0; // khởi tạo biến chứa total page

    // all products
    $dataProduct = getAllProducts($limit, $initial_page);
    $total_rows = getTotalPageProducts();

    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        switch ($category) {
            case 'thoi-trang-nam':
                $id_Nam = 1;
                $dataProduct = getAllProductWithCategory($limit, $initial_page, $id_Nam);
                $total_rows = intval(getTotalPageProductsWithCategory($id_Nam));
                break;
            case 'thoi-trang-nu':
                $id_Nu = 2;
                $dataProduct = getAllProductWithCategory($limit, $initial_page, $id_Nu);
                $total_rows = intval(getTotalPageProductsWithCategory($id_Nu));

                break;
            case 'thoi-trang-tre-em':
                $id_TreEm = 3;
                $dataProduct = getAllProductWithCategory($limit, $initial_page, $id_TreEm);
                $total_rows = intval(getTotalPageProductsWithCategory($id_TreEm));
                break;
            case 'vay-nu':
                $id_VayNu = 4;
                $dataProduct = getAllProductWithCategory($limit, $initial_page, $id_VayNu);
                $total_rows = intval(getTotalPageProductsWithCategory($id_VayNu));
                break;
            default:
                $dataProduct = getAllProducts($limit, $initial_page);
                $total_rows = intval(getTotalPageProducts());
        }
    }



    $total_pages = ceil($total_rows / $limit);


    require_once VIEW . 'layouts/master.php';
}

function detailProduct()
{
    $title = 'Detail Product';
    $view = 'product-detail';
    $script = 'detailProduct';
    $components = 'detail-product';
    $product = selectOneProduct($_GET['id'] ?? null);
    $listImage = selectListImages($_GET['id'] ?? null);

    require_once VIEW . 'layouts/master.php';
}
