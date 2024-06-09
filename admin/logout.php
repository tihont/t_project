<?php


$page = 'logout';
require_once '../classes/config.php';
require_once '../classes/CsrfTokenHelper.php';

$csrTokenHelper = new CsrfTokenHelper();
$csrTokenHelper->deleteToken();

session_destroy();
setcookie('user_token', '', time() - 3600, '/');

header('Location: login.php');
die();