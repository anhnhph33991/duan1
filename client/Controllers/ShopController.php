<?php

function shopIndex()
{
    $title = 'Shop';
    $view = 'shop';
    $script = 'shop';


    require_once VIEW . 'layouts/master.php';
}

function detailProduct()
{
    $title = 'Detail Product';
    $view = 'product-detail';
    $script = 'detailProduct';
    $components = 'detail-product';


    require_once VIEW . 'layouts/master.php';
}
