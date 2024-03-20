
<?php
require_once MODELS . 'Slide.php';
require_once MODELS . 'Category.php';
function homeIndex(){
    $view = 'home';
    $script = 'home';
    $dataSlide = selectAllSlide();
    $dataCategory = selectAllCategory();
    require_once VIEW . 'layouts/master.php';
}

?>