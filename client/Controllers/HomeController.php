
<?php
require_once MODELS . 'Slide.php';
function homeIndex(){
    $view = 'home';
    $script = 'home';
    $dataSlide = selectAllSlide();
    require_once VIEW . 'layouts/master.php';
}

?>