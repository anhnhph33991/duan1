<?php

require_once MODELS_ADMIN . 'Product.php';
require_once MODELS_ADMIN . 'Category.php';
// require_once '../core/configCloudinary.php';

function productIndex()
{
    $title = 'Products';
    $view = 'products/table';

    $page = $GLOBALS['page'];
    $limit = 10;
    $initial_page = ($page - 1) * $limit;
    $data = getAllProducts($limit, $initial_page);
    $total_rows = getTotalPageProducts();
    $total_pages = ceil($total_rows / $limit);


    require_once VIEW_ADMIN . 'layouts/master.php';
}

function productCreate()
{
    $title = 'Create';
    $view = 'products/create';
    $script = 'product';
    $categorys = selectAllCategory();


    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_FILES['image']['tmp_name'];
        $description = $_POST['description'];
        $id_category = $_POST['id_category'];

        if (empty($name)) {
            $_SESSION['errors']['name'] = 'Vui lòng nhập name';
        } else {
            unset($_SESSION['errors']['name']);
        }

        if (empty($price)) {
            $_SESSION['errors']['price'] = 'Vui lòng nhập price';
        } else {
            unset($_SESSION['errors']['price']);
        }

        if (empty($image)) {
            $_SESSION['errors']['image'] = 'Vui lòng tải image';
        } else {
            unset($_SESSION['errors']['image']);
        }

        if (empty($description)) {
            $_SESSION['errors']['description'] = 'Vui lòng nhập description';
        } else {
            unset($_SESSION['errors']['description']);
        }

        if (empty($id_category)) {
            $_SESSION['errors']['id_category'] = 'Vui lòng chọn category';
        } else {
            unset($_SESSION['errors']['id_category']);
        }

        if (!empty($_SESSION['errors'])) {
            header('location: ' . BASE_URL_ADMIN . '?act=add-product');
        } else {
            $convertDesc = strip_tags($description); // xóa bỏ tag html ở description
            $img = file_get_contents($image);
            $imgBase64 = base64_encode($img);
            insertOneProduct($name, $price, $imgBase64, $convertDesc, $id_category);
            header('location: ' . BASE_URL_ADMIN . '?act=products');
        }
    }

    require_once VIEW_ADMIN . 'layouts/master.php';
}

function productUpdate()
{
    $id = $_GET['id'] ?? null;
    $title = 'Update';
    $view = 'products/update';

    $product = selectOneProduct($id);
    $categorys = selectAllCategory();


    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_FILES['image']['tmp_name'];
        $imageOld = $_POST['imageOld'];
        $description = $_POST['description'];
        $descOld = $_POST['descOld'];
        $id_category = $_POST['id_category'] ?? $product['c_id'];
        $imageSaveDb = '';
        $descSaveDb = '';

        $convertDesc = strip_tags($description); // xóa bỏ tag html ở description

        if (empty($name)) {
            $_SESSION['errors']['name'] = 'Vui lòng nhập name';
        }elseif(strlen($name) < 5){
            
        }
         else {
            unset($_SESSION['errors']['name']);
        }

        if (empty($price)) {
            $_SESSION['errors']['price'] = 'Vui lòng nhập price';
        } else {
            unset($_SESSION['errors']['price']);
        }

        if (empty($image)) {
            $imageSaveDb = $imageOld;
        } else {
            $img = file_get_contents($image);
            $imgBase64 = base64_encode($img);
            $imageSaveDb = $imgBase64;
        }

        if (empty($description)) {
            $descSaveDb = $descOld;
        } else {
            $descSaveDb = $convertDesc;
        }

        if (!empty($_SESSION['errors'])) {
            header('Location: ' . BASE_URL_ADMIN . '?act=update-product&id=' . $id);
        } else {
            updateProduct($id, $name, $price, $imageSaveDb, $descSaveDb, $id_category);
            header('Location: ' . BASE_URL_ADMIN . '?act=products');
        }
    }


    require_once VIEW_ADMIN . 'layouts/master.php';
}

function productShow()
{
    $title = 'Show';
    $view = 'products/show';
    $id = $_GET['id'] ?? null;
    $product = selectOneProduct($id);

    require_once VIEW_ADMIN . 'layouts/master.php';
}



function productDelete()
{
    $id = $_GET['id'] ?? null;
    deleteOneProduct($id);
    header('location: ' . BASE_URL_ADMIN . '?act=products');
}
