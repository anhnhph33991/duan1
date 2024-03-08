<?php
require_once MODELS_ADMIN . 'Voucher.php';
function voucherIndex()
{
    $title = 'Vouchers';
    $view = 'vouchers/table';

    $page = $GLOBALS['page'];
    $limit = 10;
    $initial_page = ($page - 1) * $limit;
    $data = getAllVoucher($limit, $initial_page);
    $total_rows = getTotalPageVoucher();
    $total_pages = ceil($total_rows / $limit);

    require_once VIEW_ADMIN . 'layouts/master.php';
}

function voucherCreate()
{
    $title = 'Create';
    $view = 'vouchers/create';

    if (isset($_POST['submit'])) {
        $code = $_POST['code'];
        $value = $_POST['value'];
        $desc = $_POST['desc'];
        $qty = $_POST['qty'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timeCreat = date('H:i:s d-m-Y');


        if (empty($code)) {
            $_SESSION['errors']['code'] = 'Vui lòng nhập voucher code';
        } else {
            unset($_SESSION['errors']['code']);
        }

        if (empty($value)) {
            $_SESSION['errors']['value'] = 'Vui lòng nhập voucher value';
        }elseif(!is_numeric($value)){
            $_SESSION['errors']['value'] = 'Voucher Value phải là số';
        }else {
            unset($_SESSION['errors']['value']);
        }

        if (empty($desc)) {
            $_SESSION['errors']['desc'] = 'Vui lòng nhập voucher desc';
        } else {
            unset($_SESSION['errors']['desc']);
        }

        if (empty($qty)) {
            $_SESSION['errors']['qty'] = 'Vui lòng nhập voucher qty';
        } elseif (!is_numeric($qty)) {
            $_SESSION['errors']['qty'] = 'voucher qty phải là số';
        } else {
            unset($_SESSION['errors']['qty']);
        }

        if (!empty($_SESSION['errors'])) {
            header('location: ' . BASE_URL_ADMIN . '?act=add-voucher');
        } else {
            $convertDesc = strip_tags($desc);
            insertVoucher($code, $value, $convertDesc, $qty, $timeCreat);
            header('location: ' . BASE_URL_ADMIN . '?act=vouchers');
        }
    }

    require_once VIEW_ADMIN . 'layouts/master.php';
}

function voucherUpdate()
{
    $title = 'Update';
    $view = 'vouchers/update';
    $voucher = selectOneVoucher($_GET['id'] ?? null);

    require_once VIEW_ADMIN . 'layouts/master.php';


}

function voucherDelete()
{
    deleteVoucher($_GET['id'] ?? null);
    header('location: ' . BASE_URL_ADMIN . '?act=vouchers');
}

