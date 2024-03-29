<?php
require_once MODELS . 'Cart.php';
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

function checkoutIndex()
{
    $title = 'Checkout - LuxChill';
    $view = 'checkout';
    $script = 'checkout';
    $components = 'checkout';

    require_once VIEW . 'layouts/master.php';
}

function confirmIndex()
{
    $title = 'Confirm - LuxChill';
    $view = 'confirm';
    $script = 'checkout';

    require_once VIEW . 'layouts/master.php';
}
