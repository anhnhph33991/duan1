<?php
require_once MODELS_ADMIN . 'Slide.php';



function slideIndex()
{
    $title = 'Slide';
    $view = 'slides/table';

    // $data = selectAllSlide();

    $page = $GLOBALS['page'];
    $limit = 10;
    $initial_page = ($page - 1) * $limit;
    $data = getAllSlide($limit, $initial_page);
    $total_rows = getTotalPageSlide();
    $total_pages = ceil($total_rows / $limit);


    require_once VIEW_ADMIN . 'layouts/master.php';
}

function slideCreate()
{

    $title = 'Create';
    $view = 'slides/create';
    $script = 'slide';

    if (isset($_POST['submit'])) {
        $image = $_FILES['image']['tmp_name'];
        $typeSlide = $_POST['typeSlide'];

        if (empty($image)) {
            $_SESSION['errors']['image'] = 'Vui lòng tải image';
        } else {
            unset($_SESSION['errors']['image']);
        }

        if (empty($typeSlide)) {
            $_SESSION['errors']['typeSlide'] = 'Vui lòng tải typeSlide';
        } else {
            unset($_SESSION['errors']['typeSlide']);
        }

        if (!empty($_SESSION['errors'])) {
            header('location: ' . BASE_URL_ADMIN . '?act=create-slides');
        } else {
            $img = file_get_contents($image);
            $imgBase64 = base64_encode($img);
            insertSlide($imgBase64, $typeSlide);
            header('location: ' . BASE_URL_ADMIN . '?act=slides');
        }
    }

    require_once VIEW_ADMIN . 'layouts/master.php';
}

function slideUpdate()
{
}

function slideDelete()
{
    $id = $_GET['id'] ?? null;
    deleteSlide($id);
    header('location: ' . BASE_URL_ADMIN . '?act=slides');
}

function slideShow()
{
}
