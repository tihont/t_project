<?php



$page = 'home';
require_once 'classes/config.php';

require_once 'classes/Gallery.php';

$gallery = new Gallery();

require_once('front/template.php');