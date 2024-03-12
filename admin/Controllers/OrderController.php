<?php
require_once MODELS_ADMIN . 'Order.php';
function orderIndex()
{
    $title = 'Voucher';
    $view = 'orders/table';

    

    require_once VIEW_ADMIN . 'layouts/master.php';

}

function orderUpdate(){

}

function orderShow(){
    $title = 'Show';
    $view = 'orders/show';

    require_once VIEW_ADMIN . 'layouts/master.php';
}



function orderDelete(){
    
}
