<?php

require_once MODELS . 'User.php';

function loginIndex()
{
    $title = 'Login - LuxChill';
    $view = 'auth/login';
    // nếu login từ btn comment sẽ có biến này url của sản phẩm
    $auth = $_GET['auth'] ?? null;
    $idProduct = $_GET['id'] ?? null;


    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = authLogin($email); // sql check user where email

        $auth = $_GET['auth'] ?? null;

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
                setcookie("welcome", "Chào mừng bạn quay trở lại web 🎊", time() + 30);
                setcookie("type_mess", "success", time() + 1);
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'address' => $user['address'],
                    'tel' => $user['tel'],
                    'image' => $user['image'],
                    'role' => $user['role']
                ];
                // if(isset($auth)){
                //     header('location: ' . BASE_URL . $auth);
                // }

                if ($user['role'] != 1) {
                    // nếu có biến auth sau khi đăng nhập back về sản phẩm trước đó
                    if (isset($auth)) {
                        header('location: ' . BASE_URL . $auth . '&id=' . $idProduct);
                    } else {
                        // nếu k có sẽ vào trang home
                        header('location: ' . BASE_URL);
                    }
                } else {
                    header('location: ' . BASE_URL_ADMIN);
                }
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
            insertUser($username, $email, $password);
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

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        // echo $email;

        if (empty($email)) {
            $_SESSION['errors']['email'] = 'Thế thì chịu 😡';
        } else {
            unset($_SESSION['errors']['email']);
        }


        if (!empty($_SESSION['errors'])) {
            header('Location: ' . BASE_URL . '?act=forgotPassword');
        } else {
            $token = bin2hex(random_bytes(16));
            $token_hash = hash("sha256", $token);
            $expiry = date("Y-m-d H:i:s", time() + 60 * 30);
            // resetPassword($token_hash, $expiry, $email);
            $affectedRows = resetPassword($token_hash, $expiry, $email);
            $urlToken = BASE_URL . '?act=forgotPassword' . "&token=" . $token;

            $body = '<div>
            
            <div>Xin chào,</div>
            <div>
                <p>Hãy nhấn vào <a href=" ' . 'http://localhost/duan1/?act=forgotPassword&token=' . $token  . ' ">Click</a> để đặt lại mật khẩu </p>
            </div>
            
            
            </div>';

            if ($affectedRows > 0) {
                sendMail($email, 'hoanganh', 'Confim Forgot Password', $body);
                setcookie("title_confirm", "Xác nhận email thành công", time() + 1);
                setcookie("subTitle_confirm", "Vui lòng check mail để đổi lại mật khẩu", time() + 1);
                header('location: ' . BASE_URL . '?act=confirm');
            } else {
                setcookie("message", "Email này không tồn tại", time() + 1);
                setcookie("type_mess", "error", time() + 1);
                header('location: ' . BASE_URL . '?act=forgotPassword');
            }

            // echo "success. checkinbox";
            // header('location: ' . BASE_URL);
        }
    }

    require_once VIEW . 'layouts/master.php';
}

function logout()
{
    unset($_SESSION['user']);
    setcookie("message", "Đăng xuất thành công", time() + 1);
    header('location: ' . BASE_URL);
}
