<?php
/**
 * Код, отвечающий за отображение страницы с формой авторизации администратор сайта. Генерит CSRF-токен для формы,
 * сохраняет его в сессии и передает в шаблон формы.
 */

$page = 'login';
require_once '../classes/config.php';

// сгенерировать CSRF-токен для формы
$csrf_token = bin2hex(random_bytes(32));
// начать сессию, если она еще не начата
if (!isset($_SESSION)) {
    session_start();
}
// сохранить токен в сессии
$_SESSION['csrf_token'] = $csrf_token;

// подключить шаблон
require_once('../front/template.php');