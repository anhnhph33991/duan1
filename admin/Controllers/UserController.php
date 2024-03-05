<?php

require_once MODELS_ADMIN . 'User.php';

function userIndex()
{
    $title = 'User';
    $view = 'users/table';

    $page = $GLOBALS['page'];
    $limit = 10;
    $initial_page = ($page - 1) * $limit;
    $data = getAllUser($limit, $initial_page);
    $total_rows = getTotalPageUser();
    $total_pages = ceil($total_rows / $limit);

    require_once VIEW_ADMIN . 'layouts/master.php';
}


function userCreate()
{
    $title = 'Create';
    $view = 'users/create';
    $script = 'user';


    if (isset($_POST['submit'])) {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        $image = $_FILES['image']['tmp_name'];

        if (empty($username)) {
            $_SESSION['errors']['name'] = 'Vui lòng nhập name 😡';
        } elseif (strlen($username) < 5) {
            $_SESSION['errors']['name'] = 'Name phải hơn 5 kí tự 😤';
        } else {
            unset($_SESSION['errors']['name']);
        }

        if (empty($email)) {
            $_SESSION['errors']['email'] = 'Vui lòng nhập email 😡';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors']['email'] = 'Vui lòng nhập đúng định dạng email 😕';
        } elseif (validateEmailExists($email)) {
            $_SESSION['errors']['email'] = 'Email đã tồn tại 😿';
        } else {
            unset($_SESSION['errors']['email']);
        }

        if (empty($password)) {
            $_SESSION['errors']['password'] = 'Vui lòng nhập password 😡';
        } elseif (strlen($username) < 5) {
            $_SESSION['errors']['password'] = 'Password phải hơn 5 kí tự 😤';
        } else {
            unset($_SESSION['errors']['password']);
        }

        if (empty($address)) {
            $_SESSION['errors']['address'] = 'Vui lòng nhập address 😡';
        } else {
            unset($_SESSION['errors']['address']);
        }

        if (empty($tel)) {
            $_SESSION['errors']['tel'] = 'Vui lòng nhập number phone 😡';
        } elseif (!is_numeric($tel)) {
            $_SESSION['errors']['tel'] = 'Number Phone Phải là số 😤';
        } else {
            unset($_SESSION['errors']['tel']);
        }

        if (empty($image)) {
            $_SESSION['errors']['image'] = 'Vui lòng tải image 😡';
        } else {
            unset($_SESSION['errors']['image']);
        }

        if (!empty($_SESSION['errors'])) {
            header('location: ' . BASE_URL_ADMIN . '?act=add-user');
        } else {
            $img = file_get_contents($image);
            $imgBase64 = base64_encode($img);
            insertUser($username, $email, $password, $address, $tel, $imgBase64);
            header('location: ' . BASE_URL_ADMIN . '?act=users');
        }
    }


    require_once VIEW_ADMIN . 'layouts/master.php';
}

function userUpdate()
{
    $title = 'Update';
    $view = 'users/update';
    $script = 'user';

    $user = selectOneUser($_GET['id'] ?? null);

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        $image = $_FILES['image']['tmp_name'];
        $imageOld = $_POST['imageOld'];
        $imgSaveDb = '';

        if (empty($username)) {
            $_SESSION['errors']['name'] = 'Vui lòng nhập name 😡';
        } elseif (strlen($username) < 5) {
            $_SESSION['errors']['name'] = 'Name phải hơn 5 kí tự 😤';
        } else {
            unset($_SESSION['errors']['name']);
        }

        if (empty($email)) {
            $_SESSION['errors']['email'] = 'Vui lòng nhập email 😡';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors']['email'] = 'Vui lòng nhập đúng định dạng email 😕';
        } else {
            unset($_SESSION['errors']['email']);
        }

        if (empty($password)) {
            $_SESSION['errors']['password'] = 'Vui lòng nhập password 😡';
        } elseif (strlen($username) < 5) {
            $_SESSION['errors']['password'] = 'Password phải hơn 5 kí tự 😤';
        } else {
            unset($_SESSION['errors']['password']);
        }

        if (empty($address)) {
            $_SESSION['errors']['address'] = 'Vui lòng nhập address 😡';
        } else {
            unset($_SESSION['errors']['address']);
        }

        if (empty($tel)) {
            $_SESSION['errors']['tel'] = 'Vui lòng nhập number phone 😡';
        } elseif (!is_numeric($tel)) {
            $_SESSION['errors']['tel'] = 'Number Phone Phải là số 😤';
        } else {
            unset($_SESSION['errors']['tel']);
        }

        if (empty($image)) {
            $imgSaveDb = $imageOld;
        } else {
            $img = file_get_contents($image);
            $imgSaveDb = base64_encode($img);
        }

        if (!empty($_SESSION['errors'])) {
            header('location: ' . BASE_URL_ADMIN . '?act=update-user&id=' . $id);
        } else {
            updateUser($id, $username, $email, $password, $address, $tel, $imgSaveDb);
            header('location: ' . BASE_URL_ADMIN . '?act=users');
        }
    }

    require_once VIEW_ADMIN . 'layouts/master.php';
}

function userShow()
{
    $title = 'Show';
    $view = 'users/show';
    $user = selectOneUser($_GET['id'] ?? null);

    require_once VIEW_ADMIN . 'layouts/master.php';
}

function userDelete()
{
    $id = $_GET['id'] ?? null;
    deleteUser($id);
    header('location: ' . BASE_URL_ADMIN . '?act=users');
}
