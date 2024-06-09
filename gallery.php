<?php


$page = 'gallery';
require_once 'classes/config.php';

require_once 'classes/Gallery.php';


$gallery = new Gallery();
$total = $gallery->getItemsCount();
$count_pages = ceil($total / __IMAGES_PER_PAGE__);

if (isset($_GET['page']) && intval($_GET['page']) > 1) {
    if (intval($_GET['page']) > $count_pages) {
        http_response_code(404);
        die();
    }

    $last_page = (intval($_GET['page']) >= $count_pages);

    $next_page = intval($_GET['page']) + 1;
    $prev_page = intval($_GET['page']) - 1;

    $current_page = intval($_GET['page']);
} else {
    $last_page = (1 >= $count_pages);

    $next_page = 2;
    $prev_page = 0;

    $current_page = 1;
}

require_once('front/template.php');