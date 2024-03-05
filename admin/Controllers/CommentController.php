<?php

function commentIndex()
{
}
function commentCreate()
{
}
function commentUpdate()
{
}
function commentShow()
{
}

function commentDelete()
{
    deleteComment($_GET['id'] ?? null);
    header('location: ' . BASE_URL_ADMIN . '?act=comments');
}
