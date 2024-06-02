<?php

$page = 'home'; 
require_once 'classes/config.php'; 
require_once 'classes/Gallery.php';
$gallery = new Gallery();
$items = $gallery->getSliderItems();
require_once('front/template.php');