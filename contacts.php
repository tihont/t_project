<?php


$page = 'contacts'; 
require_once 'classes/config.php'; 


require_once 'classes/Contact.php';


$contact = new Contact();
$contacts = $contact->getContact(1);


if (!empty($contacts) && count($contacts) > 0) {
    
    $contact_data = $contacts[0];
} else {
    
    $contact_data = [
        'name' => '',
        'address' => '',
        'phone' => '',
        'email' => ''
    ];
}

$csrf_token = bin2hex(random_bytes(32));

if (!isset($_SESSION)) {
    session_start();
}

$_SESSION['csrf_token'] = $csrf_token;

require_once('front/template.php');