<?php

require_once MODELS . 'User.php';

function loginIndex()
{
    $title = 'Login - LuxChill';
    $view = 'auth/login';

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = authLogin($email); // sql check user where email

        if (empty($email)) {
            $_SESSION['errors']['email'] = 'Vui lòng nhập email 😡';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors']['email'] = 'Vui lòng nhập đúng định dạng email 😕';
        } else {
            unset($_SESSION['errors']['email']);
        }

        if (empty($password)) {
            $_SESSION['errors']['password'] = 'Vui lòng nhập password';
        } elseif (strlen($password) < 5) {
            $_SESSION['errors']['password'] = 'Password phải hơn 5 kí tự';
        } else {
            unset($_SESSION['errors']['password']);
        }

        if (!empty($_SESSION['errors'])) {
            header('location: ' . BASE_URL . '?act=login');
        } else {

            // echo "<pre>";
            // print_r($user);
            // echo "</pre>";

            if ($user && $password == $user['password']) {
                setcookie("message", "Đăng nhập thành công", time() + 1);
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'address' => $user['address'],
                    'tel' => $user['tel'],
                    'image' => $user['image'],
                    'role' => $user['role']
                ];
                header('location: ' . BASE_URL);
            } else {
                setcookie("message", "Email or Password không đúng. Vui lòng kiểm tra lại ? ", time() + 1);
                header('location: ' . BASE_URL . '?act=login');
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


function forgotPassword()
{
    $title = 'Forgot Password';
    $view = 'auth/forgotPassword';

    require_once VIEW . 'layouts/master.php';
}

function logout()
{
    unset($_SESSION['user']);
    setcookie("message", "Đăng xuất thành công", time() + 1);
    header('location: ' . BASE_URL);
}
