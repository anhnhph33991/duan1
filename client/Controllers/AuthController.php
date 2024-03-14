<?php

require_once MODELS . 'User.php';

function loginIndex()
{
    $title = 'Login - LuxChill';
    $view = 'auth/login';

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email)) {
            $_SESSION['errors']['email'] = 'Vui lòng nhập email';
        } else {
            unset($_SESSION['errors']['email']);
        }

        if (empty($password)) {
            $_SESSION['errors']['password'] = 'Vui lòng nhập password';
        } else {
            unset($_SESSION['errors']['password']);
        }

        if (!empty($_SESSION['errors'])) {
            header('location: ' . BASE_URL . '?act=login');
        } else {
            if ($email == 'admin@luxchill.com' && $password == '123456') {
                setcookie("message", "Đăng nhập thành công", time() + 1);
                $_SESSION['user'] = [
                    'username' => 'Hoàng Anh',
                    'email' => $email
                ];
                header('location: ' . BASE_URL);
            }
        }
    }

    require_once VIEW . 'layouts/master.php';
}

function registerIndex()
{
    $title = 'Register - LuxChill';
    $view = 'auth/register';

    $data = selectAllUser();

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $city = $_POST['city'];
        // $tel = $_POST['tel'];
        // $address = $_POST['address'];

        if (empty($username)) {
            $_SESSION['errors']['username'] = 'Vui lòng nhập username';
        } elseif (strlen($username) < 5) {
            $_SESSION['errors']['username'] = 'Username phải lớn hơn 5 kí tự';
        } else {
            unset($_SESSION['errors']['username']);
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

        if (!empty($_SESSION['errors'])) {
            header('location: ' . BASE_URL . '?act=register');
        } else {
            // insertUser($username, $email, $password);
            setcookie("message", "Đăng kí thành công", time() + 1);
            header('location: ' . BASE_URL . '?act=login');
        }
    }

    require_once VIEW . 'layouts/master.php';
}


function forgotPassword(){
    $title = 'Forgot Password';
    $view = 'auth/forgotPassword';

    require_once VIEW . 'layouts/master.php';
}

function logout(){
    unset($_SESSION['user']);
    setcookie("message", "Đăng xuất thành công", time() + 1);
    header('location: ' . BASE_URL);
}
