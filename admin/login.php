<?php


$page = 'login';
require_once '../classes/config.php';


$csrf_token = bin2hex(random_bytes(32));

if (!isset($_SESSION)) {
    session_start();
}

$_SESSION['csrf_token'] = $csrf_token;


require_once('../front/template.php');