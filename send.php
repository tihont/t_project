<?php
/**
 *  Код, обрабатывающий данные, полученный от формы обратной связи.
 */

require_once 'classes/config.php'; // подключение общей конфигурации проекта
require_once 'classes/Request.php'; // подключение класса (модели) для работы с запросами в бд

// Получить из формы данные, включая токен, сопоставить токен с сессией, сохранить данные в бд
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['request'])) {
    $page = 'send';
    $status = false;
    // Получить данные из формы
    $name = $_POST['name'];
    $name = clean($name);
    $email = $_POST['email'];
    $email = clean($email);
    $request = $_POST['request'];
    $request = clean($request);
    // Получить токен из запроса
    $token = $_POST['csrf_token'];
    // Получить токен из сессии
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!empty($_SESSION) && !empty($_SESSION['csrf_token'])) {
        $csrf_token = $_SESSION['csrf_token'];
        // Сравнить токены
        if ($token === $csrf_token) {
            unset($_SESSION['csrf_token']);
            // Добавить запрос посетителя в базу данных
            $req = new Request();
            $req->addRequest($name, $email, $request);
        }
    }
    require_once('front/template.php');
} else {
    header('Location: contacts.php');
}

/**
 * Очистка данных из формы обратной связи от лишних символов
 * @param string $value
 * @return string
 */
function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    return $value;
}
