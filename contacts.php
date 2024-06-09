<?php


$page = 'contacts'; 
require_once 'classes/config.php'; 
require_once 'classes/CsrfTokenHelper.php'; 

require_once 'classes/Contact.php';

$contact = new Contact();
$contacts = $contact->getContacts();

$csrfTokenHelper = new CsrfTokenHelper();
$csrfTokenHelper->setToken();

require_once('front/template.php');