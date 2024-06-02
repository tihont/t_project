<?php


$page = 'logout';
require_once '../classes/config.php';


if(!isset($_SESSION)) {
    session_start();
    
    if (!isset($_SESSION['user_id']) || !isset($_COOKIE['user_token'])) {
        session_destroy();
        header('Location: login.php');
        die();
    }
}


session_destroy();
setcookie('user_token', '', time() - 3600, '/');


header('Location: login.php');
die();