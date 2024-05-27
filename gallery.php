<?php
/**
 *  Код, обрабатывающий запросы к разделу Gallery.
 */

$page = 'gallery'; // для подсветки пункта меню и подключения специфических статических ресурсов
require_once 'classes/config.php'; // подключение общей конфигурации проекта

// подключение класса (модели) для работы с галереей в бд
require_once 'classes/Gallery.php';

// получение изображений из бд для отображения в шаблоне

$gallery = new Gallery();
$total = $gallery->getItemsCount();
$count_pages = ceil($total / __IMAGES_PER_PAGE__);

if (isset($_GET['page']) && intval($_GET['page']) > 1) {
    // проверить, не выходит ли параметр page за пределы общего количества страниц
    if (intval($_GET['page']) > $count_pages) {
        // вернуть статус 404
        http_response_code(404);
        die();
    }

    // проверить, является ли текущая страница последней
    $last_page = (intval($_GET['page']) >= $count_pages);

    $next_page = intval($_GET['page']) + 1;
    $prev_page = intval($_GET['page']) - 1;

    $items = $gallery->getItems(intval($_GET['page']));
} else {
    // проверить, является ли текущая страница последней
    $last_page = (1 >= $count_pages);

    $next_page = 2;
    $prev_page = 0;

    $items = $gallery->getItems();
}

// подключение шаблона
require_once('front/template.php');