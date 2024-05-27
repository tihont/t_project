<?php
/**
 * Код, выполняющий авторизацию администратора в ответ на HTTP POST запрос из формы авторизации. Если авторизация прошла
 * успешно, то создается токен для админа и сохраняется в сессии и куках. После этого происходит перенаправление на
 * страницу управления администратора. В случае ошибки авторизации, пользователь перенаправляется обратно на страницу
 * авторизации для повторного ввода логина и пароля.
 */

$page = 'auth';
require_once '../classes/config.php';
require_once '../classes/User.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $csrf_token = $_POST['csrf_token'];
    if (!isset($_SESSION)) {
        session_start();
    }
    if ($csrf_token == $_SESSION['csrf_token']) {
        unset($_SESSION['csrf_token']);
        $user = new User();
        $u = $user->checkAuth($email, $password);
        if ($u) {
            // создать токен для админа и сохранить его в сессии и куках
            $token = md5($u['email'] . $u['password'] . time());
            $_SESSION['user_id'] = $u['id'];
            $_SESSION['user_token'] = $token;
            setcookie('user_token', $token, time() + 3600 * 24 * 30, '/');
            header('Location: ../control.php');
            die();
        } else {
            $error_message = "Email or password is incorrect!";
        }
    } else {
        $error_message = "csrf token is incorrect!";
    }
} else {
    $error_message = "Please enter your email and password!";
}

require_once('../front/template.php');