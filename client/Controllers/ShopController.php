<?php

require_once MODELS . 'Category.php';
require_once MODELS . 'Product.php';
require_once MODELS . 'Comment.php';
require_once MODELS . 'Cart.php';

function shopIndex()
{
    $title = 'Shop';
    $view = 'shop';
    $script = 'shop';
    $dataCategory = selectAllCategory(); // select all category

    $page = $GLOBALS['page'] ?? 1;
    $limit = 12;
    $initial_page = ($page - 1) * $limit;
    $dataProduct = []; // khởi tạo biến chứa data
    $total_rows = 0; // khởi tạo biến chứa total page

    // all products
    $dataProduct = getAllProducts($limit, $initial_page);
    $total_rows = getTotalPageProducts();

    if (isset($_SESSION['user'])) {
        $idUser = $_SESSION['user']['id'];
        $dataGetCount = getCountRowsCart($idUser);
    }

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

    if (isset($_GET['price'])) {
        $price = $_GET['price'];
        switch ($price) {
            case '50000-99000':
                $dataProduct = getAllProductWithPrice($limit, $initial_page, 50000, 99000);
                $total_rows = getTotalPageProductsWithPrice(50000, 99000);
                break;
            case '120000-199000':
                $dataProduct = getAllProductWithPrice($limit, $initial_page, 120000, 199000);
                $total_rows = getTotalPageProductsWithPrice(120000, 199000);
                break;
            case '250000-399000':
                $dataProduct = getAllProductWithPrice($limit, $initial_page, 250000, 399000);
                $total_rows = getTotalPageProductsWithPrice(250000, 399000);
                break;
            case '450000-599000':
                $dataProduct = getAllProductWithPrice($limit, $initial_page, 450000, 599000);
                $total_rows = getTotalPageProductsWithPrice(450000, 599000);
                break;
        }
    }

    if (isset($_GET['search'])) {
        $dataProduct = getSearchProduct($_GET['search'], $limit, $initial_page);
        $total_rows = getTotalPageProductsWithSearch($_GET['search']);
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
    if ($product) {
        updateProductView($_GET['id'], $countView);
        $listImage = explode(',', $product['p_image']);
    }

    $dataComment = selectAllComment($_GET['id']);
    // sản phẩm liên quan
    $productRelated = selectProductWithCategory($product['c_id']);

    require_once VIEW . 'layouts/master.php';
}


function handleAddToCart()
{
    // if ($_POST) {
    //     $idProduct = $_POST['idProduct'];
    //     $nameProduct = $_POST['nameProduct'];
    //     $priceProduct = $_POST['priceProduct'];
    //     $imageProduct = $_POST['imageProduct'];
    //     $descriptionProduct = $_POST['descriptionProduct'];
    //     $typeProduct = $_POST['typeProduct'];
    //     $cName = $_POST['cName'];
    //     $idUser = $_POST['idUser'] ?? 0;

    //     $cartItemCount = 0;
    //     $dataCart = [];

    //     // $checkAuth = isset($_SESSION['user']) ? 'yes' : 'no';

    //     // if ($idUser !== 0) {
    //     //     insertOneCartProduct($nameProduct, $imageProduct, $priceProduct, $idUser, $idProduct, $descriptionProduct, $typeProduct,$cName);
    //     // }    

    //     // 2 Luồng:
    //     /*
    //      *
    //      * 1. Khi có login
    //      * 2. Khi k login 
    //      * 
    //      *
    //      */

    //     // if ($idUser == 0) {
    //     //     // tạo session cart
    //     //     if (!isset($_SESSION['cart'])) {
    //     //         $_SESSION['cart'] = array();
    //     //     }

    //     //     // lưu vào ss
    //     //     $newProduct = array(
    //     //         'product_id' => $idProduct,
    //     //         'name' => $nameProduct,
    //     //         'price' => $priceProduct,
    //     //         'image' => $imageProduct,
    //     //         'descriptionProduct' => $descriptionProduct,
    //     //         'typeProduct' => $typeProduct,
    //     //         'cName' => $cName,
    //     //         'idUser' => $idUser
    //     //     );

    //     //     $_SESSION['cart'][] = $newProduct;
    //     //     $cartItemCount = count($_SESSION['cart']);
    //     // }else{
    //     //     insertOneCartProduct($nameProduct, $imageProduct, $priceProduct, $idUser, $idProduct, $descriptionProduct, $typeProduct, $cName);
    //     //     $dataCart = getAllCart($idUser);
    //     //     $cartItemCount = count($dataCart);
    //     // }


    //     // $_SESSION['cart'][] = $newProduct;
    //     // $cartItemCount = count($_SESSION['cart']);

    //     // return res
    //     // $response = array(
    //     //     'cartItemCount' => $cartItemCount,
    //     //     'cartItem' => $newProduct,
    //     //     'countIdUser' => $idUser,
    //     // );

    //     // // Trả về dữ liệu dưới dạng JSON
    //     // header('Content-Type: application/json');
    //     // echo json_encode($response);
    //     // exit; // Kết thúc script PHP sau khi gửi dữ liệu JSON

    //     if ($idUser == 0) {
    //         // tạo session cart
    //         if (!isset($_SESSION['cart'])) {
    //             $_SESSION['cart'] = array();
    //         }

    //         // lưu vào ss
    //         $newProduct = array(
    //             'product_id' => $idProduct,
    //             'name' => $nameProduct,
    //             'price' => $priceProduct,
    //             'image' => $imageProduct,
    //             'descriptionProduct' => $descriptionProduct,
    //             'typeProduct' => $typeProduct,
    //             'cName' => $cName,
    //             'idUser' => $idUser
    //         );

    //         $_SESSION['cart'][] = $newProduct;
    //         $cartItemCount = count($_SESSION['cart']);

    //         // Gửi $newProduct trong trường hợp không đăng nhập
    //         $response = array(
    //             'cartItemCount' => $cartItemCount,
    //             'cartItem' => $newProduct,
    //             'countIdUser' => $idUser,
    //         );
    //     } else {
    //         // Thực hiện thêm sản phẩm vào giỏ hàng cho người dùng đã đăng nhập
    //         insertOneCartProduct($nameProduct, $imageProduct, $priceProduct, $idUser, $idProduct, $descriptionProduct, $typeProduct, $cName);
    //         $dataCart = getAllCart($idUser);
    //         $cartItemCount = count($dataCart);

    //         // Gửi một phản hồi không có giá trị cartItem trong trường hợp đã đăng nhập
    //         $response = array(
    //             'cartItemCount' => $cartItemCount,
    //             'countIdUser' => $idUser,
    //         );
    //     }

    //     // Trả về dữ liệu dưới dạng JSON
    //     header('Content-Type: application/json');
    //     echo json_encode($response);
    //     exit; // Kết thúc script PHP sau khi gửi dữ liệu JSON

    // }

    // Khởi tạo biến để lưu số lượng sản phẩm trong giỏ hàng
    $cartItemCount = 0;
    $countproductId = 0;
    $successmess = '';

    if (!isset($_SESSION['user'])) {
        // Nếu người dùng không đăng nhập, thêm sản phẩm vào giỏ hàng phiên
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
    }

    if ($_POST) {
        // Lấy thông tin sản phẩm từ POST
        $idProduct = isset($_POST['idProduct']) ? $_POST['idProduct'] : null;
        $nameProduct = isset($_POST['nameProduct']) ? $_POST['nameProduct'] : null;
        $priceProduct = isset($_POST['priceProduct']) ? $_POST['priceProduct'] : null;
        $imageProduct = isset($_POST['imageProduct']) ? $_POST['imageProduct'] : null;
        $descriptionProduct = isset($_POST['descriptionProduct']) ? $_POST['descriptionProduct'] : null;
        $typeProduct = isset($_POST['typeProduct']) ? $_POST['typeProduct'] : null;
        $cName = isset($_POST['cName']) ? $_POST['cName'] : null;
        $idUser = isset($_POST['idUser']) ? $_POST['idUser'] : 0;
        $qtyProduct = isset($_POST['qtyProduct']) ? $_POST['qtyProduct'] : 1;

        if ($idUser == 0) {
            // $idRandom = uniqid();
            // Lưu thông tin sản phẩm vào giỏ hàng phiên
            $newProduct = array(
                'product_id' => $idProduct,
                'name' => $nameProduct,
                'price' => $priceProduct,
                'image' => $imageProduct,
                'descriptionProduct' => $descriptionProduct,
                'typeProduct' => $typeProduct,
                'cName' => $cName,
                'idUser' => $idUser,
                'qty' => 1
            );

            if (isset($_SESSION['cart'][$newProduct['product_id']])) {
                $_SESSION['cart'][$newProduct['product_id']]['qty'] += 1;
            } else {
                $_SESSION['cart'][$newProduct['product_id']] = $newProduct;
                $cartItemCount = count($_SESSION['cart']);
            }

            $cartItemCount = count($_SESSION['cart']);
        } else {
            // check xem có sản phẩm trong db chưa
            $checkRowProduct = checkProductCart($idUser, $idProduct);

            if ($checkRowProduct > 0) {
                // nếu đã có sản phẩm trong table cart thì tăng qty
                $qtyProduct = getQtyProduct($idProduct, $idUser);
                updateQtyProduct($idProduct, $qtyProduct + 1, $idUser);
            } else {
                // Nếu người dùng đã đăng nhập, thêm sản phẩm vào giỏ hàng cơ sở dữ liệu
                insertOneCartProduct($nameProduct, $imageProduct, $priceProduct, $idUser, $idProduct, $descriptionProduct, $typeProduct, $cName, $qtyProduct);
                $cartItemCount =  getCountRowsCart($idUser);
            }
            $cartItemCount =  getCountRowsCart($idUser);
        }

        // Tạo mảng phản hồi JSON
        $response = array(
            'cartItemCount' => $cartItemCount,
            'countIdUser' => $idUser,
            'countProduct' => $countproductId,
            // 'checkProductAut' => $checkProductAut,
            // 'successmess' => $successmess,
            // 'id' => $idRandom,
        );

        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($response);
        exit; // Kết thúc script PHP sau khi gửi dữ liệu JSON
    }
}

function handleRemoveProduct()
{
    $id = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
    $idProduct = $_GET['id'] ?? null;

    if (isset($_SESSION['user'])) {
        // call function delete product in cart
        deleteQtyProduct($idProduct, $id);
    } else {
        unset($_SESSION['cart'][$idProduct]);
    }

    setcookie("message", "Xóa thành công 🎊", time() + 1);
    setcookie("type_mess", "success", time() + 1);
    header('Location: ' . BASE_URL . '?act=cart');
}

function reviewIndex()
{
    $title = 'Rite Comment';
    $view = 'leave-review';
    $product = selectOneProduct($_GET['id'] ?? null);

    if (isset($_POST['submit'])) {
        $content = $_POST['content'];
        $idProduct = $_POST['idProduct'];
        $idUser = $_POST['idUser'];


        if (empty($content)) {
            $_SESSION['error']['content'] = 'Vui lòng nhập content';
        } else {
            unset($_SESSION['error']['content']);
        }

        if (!empty($_SESSION['error'])) {
            header('location: ' . BASE_URL . '?act=leave-review&id=' . $idProduct);
        } else {
            // echo $title . '</br>';
            // echo $idProduct . '</br>';
            // echo $idUser . '</br>';
            $timeComment = date("Y-m-d H:i:s", time() + 60 * 30);
            insertComment($content, $idUser, $idProduct, $timeComment);
            header('location: ' . BASE_URL . '?act=product-detail&id=' . $idProduct);
        }
    }

    require_once VIEW . 'layouts/master.php';
}
