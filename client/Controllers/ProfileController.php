<?php
require_once MODELS . 'Order.php';
function checkOrderIndex()
{
    $title = 'Check Order';
    $view = 'checkOrder';
    $script = 'checkOrder';


    if (isset($_GET['search'])) {
        $keyw = $_GET['search'];
        $dataOrder = selectCodeOrder($keyw);
        // echo $keyw;
    }
    require_once VIEW . 'layouts/master.php';
}

function myOrderIndex()
{
    $title = 'My Order';
    $view = 'myOrder';
    
    if(!empty($_SESSION['user'])){
        $selectOneOrder = selectOneOrder($_SESSION['user']['username']);
    }


    require_once VIEW . 'layouts/master.php';
}

function showMyOrder(){
    $title = 'Show Order';
    $view = 'showOrder';

    $dataSelectOrder =  selectOrderWithId($_GET['id'] ?? null);
    $dataJoin = showOrder($_GET['id'] ?? null, $dataSelectOrder['idProduct_cart']);


    require_once VIEW . 'layouts/master.php';
}

function deleteOneOrder(){
    $id = $_GET['id'];
    deleteOrder($id);
    setcookie("message", "Xóa thành công 🎊", time() + 1);
    setcookie("type_mess", "success", time() + 1);
    header('location: ' . BASE_URL . '?act=my-order');
}

function profileIndex()
{
    $title = 'Profile';
    $view = 'profile';
    require_once VIEW . 'layouts/master.php';
}
