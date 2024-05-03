<?php
require_once MODELS_ADMIN . 'Order.php';
function orderIndex()
{
    $title = 'Voucher';
    $view = 'orders/table';

    $page = $GLOBALS['page'];
    $limit = 10;
    $initial_page = ($page - 1) * $limit;
    $dataOrder = getAllOrder($limit, $initial_page);
    $total_rows = getTotalPageOrder();
    $total_pages = ceil($total_rows / $limit);


    require_once VIEW_ADMIN . 'layouts/master.php';
}

function orderUpdate()
{
}

function orderShow()
{
    $title = 'Show';
    $view = 'orders/show';
    $id = $_GET['id'] ?? null;

    $dataOrder = selectOneOrder($id);

    // $listIdProduct = explode(',', $dataOrder['idProduct_cart']);
    // $listIdProductString = implode(',', $listIdProduct);

    // print_r($listIdProduct) . '</br>';
    // echo $listIdProductString;

    $testdata = showOrder($id, $dataOrder['idProduct_cart']);

    if (isset($_POST['submit'])) {
        $status = $_POST['status'] ?? $dataOrder['status'];
        updateStatusOrder($status, $id);
        header('location: ' . BASE_URL_ADMIN . '?act=orders');
    }

    require_once VIEW_ADMIN . 'layouts/master.php';
}



function orderDelete()
{
    $id = $_GET['id'] ?? null;
    deleteOrder($id);
    setcookie("message", "Xóa thành công 🎊", time() + 1);
    setcookie("type_mess", "success", time() + 1);
    header('location: ' . BASE_URL_ADMIN . '?act=orders');
}
