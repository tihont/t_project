<?php


define('__SITE_ROOT__', '/t_project/');


define('__IMAGES_PER_PAGE__', 12);


if (isset($_COOKIE['user_token'])) {
    session_start();
    if (isset($_SESSION['user_id']) && isset($_SESSION['user_token']) && isset($_COOKIE['user_token']) && ($_COOKIE['user_token'] === $_SESSION['user_token'])) {
        define('__IS_ADMIN__', true);
    }
}


require_once('Db.php');
require_once('Menu.php');


$customer_menu = new Menu(array("home" => array("title" => "Home", "url" => __SITE_ROOT__),
    "gallery" => array("title" => "Gallery", "url" => __SITE_ROOT__ . "gallery.php"),
    "about" => array("title" => "About", "url" => __SITE_ROOT__ . "about.php"),
    "contacts" => array("title" => "Contacts", "url" => __SITE_ROOT__ . "contacts.php"),
    "login" => array("title" => "Sign in", "url" =>  __SITE_ROOT__ . "admin/login.php")));


$admin_menu = new Menu(array("home" => array("title" => "Home", "url" => __SITE_ROOT__),
    "gallery" => array("title" => "Gallery", "url" => __SITE_ROOT__ . "gallery.php"),
    "about" => array("title" => "About", "url" => __SITE_ROOT__ . "about.php"),
    "contacts" => array("title" => "Contacts", "url" => __SITE_ROOT__ . "contacts.php"),
    "control" => array("title" => "Control", "url" => __SITE_ROOT__ . "control.php"),
    "logout" => array("title" => "Sign out", "url" => __SITE_ROOT__ . "admin/logout.php")));