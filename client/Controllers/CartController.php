<?php

function cartIndex()
{
    $title = 'Cart - LuxChill';
    $view = 'cart';
    // $script = 'cart';


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
