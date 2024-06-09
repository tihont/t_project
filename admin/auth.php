<?php


$page = 'auth';
require_once '../classes/config.php';
require_once '../classes/CsrfTokenHelper.php';
require_once '../classes/MessageHelper.php';
require_once '../classes/User.php';

$error_message = '';
$error_title = '';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $csrf_token = $_POST['csrf_token'];
    $csrTokenHelper = new CsrfTokenHelper();
    if ($csrTokenHelper->validateToken($csrf_token)) {
        $csrTokenHelper->deleteToken();
        $user = new User();
        $u = $user->checkAuth($email, $password);
        if ($u) {
            
            $token = md5($u['email'] . $u['password'] . time());
            $_SESSION['user_id'] = $u['id'];
            $_SESSION['user_token'] = $token;
            setcookie('user_token', $token, time() + 3600 * 24 * 30, '/');
            header('Location: ../control.php');
            die();
        } else {
            $error_title = "Failed to log in!";
            $error_message = "Email or password is incorrect!";
        }
    } else {
        $error_title = "Failed to log in!";
        $error_message = "csrf token is incorrect!";
    }
} else {
    $error_title = "Failed to log in!";
    $error_message = "Please enter your email and password!";
}

$errorMessage = new MessageHelper($error_title, $error_message);

require_once('../front/template.php');