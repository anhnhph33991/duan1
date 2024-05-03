<?php
require_once MODELS . 'Cart.php';
require_once MODELS . 'Order.php';
function cartIndex()
{
    $title = 'Cart - LuxChill';
    $view = 'cart';
    $script = 'cart';
    $id = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;

    // $countCart = getCountRowsCart($id);
    $dataCart = [];

    if ($id !== 0) {
        $dataCart = getAllCart($id);
    } else {
        $dataCart = $_SESSION['cart'] ?? null;
    }


    require_once VIEW . 'layouts/master.php';
}

// function handle momo
function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}

function checkoutIndex()
{
    $title = 'Checkout - LuxChill';
    $view = 'checkout';
    $script = 'checkout';
    $components = 'checkout';
    $id = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
    $dataCart = [];

    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);
    $codeProduct = 'LuxChill' . time();

    if ($id !== 0) {
        $dataCart = getAllCart($id);
        $user = selectOneUser($id);
    } else {
        $dataCart = $_SESSION['cart'] ?? null;
    }

    $pricePayMomo = 0;
    $listProductId = '';
    foreach ($dataCart as $value) {
        $priceAllProduct = $value['qty'] * $value['price'];
        $pricePayMomo += $priceAllProduct;

        if ($listProductId !== '') {
            $listProductId .= ',';
        }

        // Thêm giá trị product_id vào biến chuỗi
        $listProductId .= $value['id'];
    }


    $body = '
    <div>
        <div>Xin chao, ' . $user['username']  . '</div>
        <div>
            Bạn vừa đặt hàng thành công 1 đơn hàng bên Luxchill Shop, Chúng tôi sẽ gọi xác nhận với bạn trong ít phút. cảm ơn bạn đã sử dụng dịch vụ của chúng tôi
        </div>
        <div>
            Mã đơn hàng của bạn là: <span> ' . $codeProduct . '</span>
        </div>
    </div>
    ';


    if (isset($_POST['payUrl'])) {

        $payOnline = $_POST['paypal'];

        // $address = $_POST['address'];        

        if ($payOnline == 'cod') {
            setcookie("title_confirm", "Mua hàng thành công", time() + 1);
            setcookie("subTitle_confirm", "Đã gửi mail xác nhận đơn hàng", time() + 1);
            sendMail($user['email'], $user['username'], 'Mua hang thanh cong', $body);
            insertOrder('cod', $user['address'], 'Đang Xử Lý', $pricePayMomo, $listProductId, $expiry, $codeProduct, $user['username']);
            updateStatusCart($listProductId, "sold");
            header('location: ' . BASE_URL . '?act=confirm');
        } else {
            momoPay($pricePayMomo);
        }
    }

    //nếu thanh toán thành công
    if (isset($_GET['resultCode']) && $_GET['resultCode'] == 0) {
        setcookie("title_confirm", "Mua hàng thành công", time() + 1);
        setcookie("subTitle_confirm", "Đã gửi mail xác nhận đơn hàng", time() + 1);
        sendMail($user['email'], $user['username'], 'Mua hang thanh cong', $body);
        insertOrder('Đã thanh toán', $user['address'], 'Đang Xử Lý', $pricePayMomo, $listProductId, $expiry, $codeProduct, $user['username']);
        updateStatusCart($listProductId, "sold");
        header('location: ' . BASE_URL . '?act=confirm');
    }


    require_once VIEW . 'layouts/master.php';
}

// function xử lí khi đã thanh toán thành công
function handleDataMomo()
{
    if (isset($_GET['resultCode']) && $_GET['resultCode'] == 0) {
        setcookie("title_confirm", "Mua hàng thành công", time() + 1);
        setcookie("subTitle_confirm", "Đã gửi mail xác nhận đơn hàng", time() + 1);
        header('location: ' . BASE_URL . '?act=confirm');
    }
}

function confirmIndex()
{
    $title = 'Confirm - LuxChill';
    $view = 'confirm';
    $script = 'checkout';

    require_once VIEW . 'layouts/master.php';
}

function updateCart()
{

    if (isset($_POST)) {
        $qtyValue = $_POST['inputQty'] ?? null;
        $productId = $_POST['productId'] ?? null;
        $productPrice = $_POST['productPrice'] ?? null;
        $idUser = $_POST['idUser'] ?? null;


        $calPrice  = $productPrice * $qtyValue; // tính subTotal của từng sản phẩm

        if ($idUser == 0) {
            // thay đổi qty của sản phẩm
            $_SESSION['cart'][$productId]['qty'] = $qtyValue;
        } else {
            updateQtyProduct($productId, $qtyValue, $idUser);
        }
        // 






        $response = array(
            'qtyValue' => $qtyValue,
            // 'productId' => $productId,
            'productPrice' => $calPrice,
            'idUser' => $idUser,
        );

        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($response);
        exit; // Kết thúc script PHP sau khi gửi dữ liệu JSON
    }
}
