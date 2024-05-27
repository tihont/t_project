<?php
/**
 * Конфигурационный файл, содержащий общие настройки и константы, используемые в проекте
 */

define('__SITE_ROOT__', '/t_project/');

// количество карточек на странице фотогалереи
define('__IMAGES_PER_PAGE__', 12);

// проверка на авторизацию
if (isset($_COOKIE['user_token'])) {
    session_start();
    if (isset($_SESSION['user_id']) && isset($_SESSION['user_token']) && isset($_COOKIE['user_token']) && $_COOKIE['user_token'] === $_SESSION['user_token']) {
        define('__IS_ADMIN__', true);
    }
}

// подключение базовой модели данных (используется в моделях) и класса меню
require_once('Db.php');
require_once('Menu.php');

// создание объекта меню для посетителя сайта
$customer_menu = new Menu(array("home" => array("title" => "Home", "url" => __SITE_ROOT__),
    "gallery" => array("title" => "Gallery", "url" => __SITE_ROOT__ . "gallery.php"),
    "about" => array("title" => "About", "url" => __SITE_ROOT__ . "about.php"),
    "contacts" => array("title" => "Contacts", "url" => __SITE_ROOT__ . "contacts.php"),
    "login" => array("title" => "Sign in", "url" =>  __SITE_ROOT__ . "admin/login.php")));

// создание объекта меню для администратора
$admin_menu = new Menu(array("home" => array("title" => "Home", "url" => __SITE_ROOT__),
    "gallery" => array("title" => "Gallery", "url" => __SITE_ROOT__ . "gallery.php"),
    "about" => array("title" => "About", "url" => __SITE_ROOT__ . "about.php"),
    "contacts" => array("title" => "Contacts", "url" => __SITE_ROOT__ . "contacts.php"),
    "control" => array("title" => "Control", "url" => __SITE_ROOT__ . "control.php"),
    "logout" => array("title" => "Sign out", "url" => __SITE_ROOT__ . "admin/logout.php")));