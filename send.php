<?php


require_once 'classes/config.php'; 
require_once 'classes/Request.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['request'])) {
    $page = 'send';
    $status = false;
    $name = $_POST['name'];
    $name = clean($name);
    $email = $_POST['email'];
    $email = clean($email);
    $request = $_POST['request'];
    $request = clean($request);
    $token = $_POST['csrf_token'];
    $req = new Request();
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!empty($_SESSION) && !empty($_SESSION['csrf_token'])) {
        $csrf_token = $_SESSION['csrf_token'];
        if ($token === $csrf_token) {
            unset($_SESSION['csrf_token']);
            $last_id = $req->addRequest($name, $email, $request);
            $status = true;
        }
    }
    require_once('front/template.php');
} else {
    header('Location: contacts.php');
}


function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    return $value;
}
