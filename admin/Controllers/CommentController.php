<?php
require_once MODELS_ADMIN . 'Comment.php';
function commentIndex()
{
    $title = 'Comments';
    $view = 'comments/table';

    $page = $GLOBALS['page'];
    $limit = 10;
    $initial_page = ($page - 1) * $limit;
    $data = getAllComment($limit, $initial_page);
    $total_rows = getTotalPageComment();
    $total_pages = ceil($total_rows / $limit);

    require_once VIEW_ADMIN . 'layouts/master.php';
}

function commentUpdate()
{
    $title = 'Update';
    $view = 'comments/update';


    require_once VIEW_ADMIN . 'layouts/master.php';
}
function commentShow()
{
    $title = 'Show';
    $view = 'comments/show';
    $comment = selectOneComment($_GET['id'] ?? null);

    require_once VIEW_ADMIN . 'layouts/master.php';
}

function commentDelete()
{
    deleteComment($_GET['id'] ?? null);
    header('location: ' . BASE_URL_ADMIN . '?act=comments');
}
