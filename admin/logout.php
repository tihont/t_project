<?php
/**
 * Код, обрабатывающий запросы на выход из админ-панели. По завершению работы выполняет переадресацию на страницу с
 * формой авторизации.
 */

$page = 'logout';
require_once '../classes/config.php';

// инициализация сессии, если она еще не инициализирована
if(!isset($_SESSION)) {
    session_start();
    // проверка наличия идентификатора пользователя и токена в сессии (если нет, значит пользователь не авторизован)
    if (!isset($_SESSION['user_id']) || !isset($_COOKIE['user_token'])) {
        session_destroy();
        header('Location: login.php');
        die();
    }
}

// удаление сессии и куки с токеном админа
session_destroy();
setcookie('user_token', '', time() - 3600, '/');

// перенаправление на страницу авторизации
header('Location: login.php');
die();