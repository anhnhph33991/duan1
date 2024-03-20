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
        $price = str_replace('.', '', $_POST['price']);
        $image = $_FILES['image'];
        $description = $_POST['description'];
        $id_category = $_POST['id_category'] ?? null;

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
            $image = upload_file($image, 'public/image/'); // gọi function handle image
            insertOneProduct($name, $price, $image, $convertDesc, $id_category);
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
    $script = 'product';

    $product = selectOneProduct($id);
    $categorys = selectAllCategory();


    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_FILES['image'];
        $imageOld = $_POST['imageOld'];
        $description = $_POST['description'];
        $descOld = $_POST['descOld'];
        $id_category = $_POST['id_category'] ?? $product['c_id'];
        $status = $_POST['status'] ?? $product['p_status'];
        $imageSaveDb = '';
        $descSaveDb = '';

        $convertDesc = strip_tags($description); // xóa bỏ tag html ở description

        if (empty($name)) {
            $_SESSION['errors']['name'] = 'Vui lòng nhập name';
        } elseif (strlen($name) < 5) {
            $_SESSION['errors']['name'] = 'Name phải lớn hơn 5 kí tự';
        } else {
            unset($_SESSION['errors']['name']);
        }

        if (empty($price)) {
            $_SESSION['errors']['price'] = 'Vui lòng nhập price';
        } else {
            unset($_SESSION['errors']['price']);
        }

        if (empty($image['name'])) {
            $imageSaveDb = $imageOld;
        } else {
            $imageSaveDb = upload_file($image, 'public/image/');
        }

        if (empty($description)) {
            $descSaveDb = $descOld;
        } else {
            $descSaveDb = $convertDesc;
        }

        if (!empty($_SESSION['errors'])) {
            header('Location: ' . BASE_URL_ADMIN . '?act=update-product&id=' . $id);
        } else {
            updateProduct($id, $name, $price, $imageSaveDb, $descSaveDb, $id_category, $status);
            setcookie("message", "Update thành công 🎊", time() + 1);
            setcookie("type_mess", "success", time() + 1);
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
    setcookie("message", "Xóa thành công 🎊", time() + 1);
    setcookie("type_mess", "success", time() + 1);
    header('location: ' . BASE_URL_ADMIN . '?act=products');
}

