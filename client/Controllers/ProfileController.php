<?php

function checkOrderIndex(){
    $title = 'Check Order';
    $view = 'checkOrder';
    require_once VIEW . 'layouts/master.php';
}

function myOrderIndex(){
    $title = 'My Order';
    $view = 'myOrder';
    require_once VIEW . 'layouts/master.php';
}

function profileIndex(){
    $title = 'Profile';
    $view = 'profile';
    require_once VIEW . 'layouts/master.php';
}

?>