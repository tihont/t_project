<?php


$page = 'login';
require_once '../classes/config.php';
require_once '../classes/CsrfTokenHelper.php';

$csrfTokenHelper = new CsrfTokenHelper();
$csrfTokenHelper->setToken();

require_once('../front/template.php');