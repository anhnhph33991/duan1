
<?php
require_once MODELS . 'Slide.php';
require_once MODELS . 'Category.php';
require_once MODELS . 'Product.php';
function homeIndex()
{
    $view = 'home';
    $script = 'home';
    $dataSlide = selectAllSlide();
    $dataCategory = selectAllCategory();

    // top selling
    $dataTop8 = selectGet8Products();
    $data8prodctViews =  selectTopProductViews();
    require_once VIEW . 'layouts/master.php';
}

?>