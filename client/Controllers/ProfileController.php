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
    require_once VIEW . 'layouts/master.php';
}

function profileIndex()
{
    $title = 'Profile';
    $view = 'profile';
    require_once VIEW . 'layouts/master.php';
}
