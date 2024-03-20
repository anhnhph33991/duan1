<?php

require_once MODELS . 'Category.php';
require_once MODELS . 'Product.php';
require_once MODELS . 'Comment.php';

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
    $countView = $product['p_views'] + 1;
    if ($product){
        updateProductView($_GET['id'], $countView);
    }

        $listImage = selectListImages($_GET['id'] ?? null);
    $dataComment = selectAllComment();
    // data biến thể
    $dataColor = selectColorProduct('colors', $_GET['id'] ?? null);
    $dataSize = selectSizeProduct('sizes', $_GET['id'] ?? null);
    // end data biến thể
    $listColor = [];
    $listSize = [];

    $productRelated = selectProductWithCategory($product['c_id']);


    // echo "<pre>";
    // print_r($dataColor);
    // echo "</pre>";
    // echo "<pre>";
    // print_r($listColor);
    // echo "</pre>";





    require_once VIEW . 'layouts/master.php';
}


function handleAddToCart()
{
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if ($_POST) {
        $idProduct = $_POST['idProduct'];
        $nameProduct = $_POST['nameProduct'];
        $priceProduct = $_POST['priceProduct'];
        $imageProduct = $_POST['imageProduct'];
        $descriptionProduct = $_POST['descriptionProduct'];
        $typeProduct = $_POST['typeProduct'];
        $cName = $_POST['cName'];
        $idUser = $_POST['idUser'];



        $newProduct = array(
            'idProduct' => $idProduct,
            'nameProduct' => $nameProduct,
            'priceProduct' => $priceProduct,
            'imageProduct' => $imageProduct,
            'descriptionProduct' => $descriptionProduct,
            'typeProduct' => $typeProduct,
            'cName' => $cName,
            'idUser' => $idUser
        );

        $_SESSION['cart'][] = $newProduct;
        $cartItemCount = count($_SESSION['cart']);

        // return res
        $response = array(
            'cartItemCount' => $cartItemCount
            // 'cartItem' => $_SESSION['cart']
        );

        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($response);
        exit; // Kết thúc script PHP sau khi gửi dữ liệu JSON
    }
}

function handleRemoveProduct()
{
    $id = $_GET['id'] ?? null;
    $name = $_GET['name'] ?? null;

    unset($_SESSION['cart'][$id]);
    setcookie("message", "Xóa thành công - $name 🎊", time() + 1);
    setcookie("type_mess", "success", time() + 1);
    header('Location: ' . BASE_URL . '?act=cart');
}

function reviewIndex()
{
    $title = 'Rite Comment';
    $view = 'leave-review';


    if (isset($_POST['submit'])) {
        $content = $_POST['content'];


        if (empty($content)) {
            $_SESSION['error']['content'] = 'Vui lòng nhập content';
        } else {
            unset($_SESSION['error']['content']);
        }

        if (!empty($_SESSION['error'])) {
            header('location: ' . BASE_URL . '?act=leave-review');
        } else {
            header('location: ');
        }
    }

    require_once VIEW . 'layouts/master.php';
}
