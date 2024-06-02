<?php


$page = 'about'; 
require_once 'classes/config.php'; 


require_once 'classes/Specification.php';


$specification = new Specification();
$groups = $specification->getGroups();


require_once('front/template.php');