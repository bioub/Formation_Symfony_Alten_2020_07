<?php
require_once 'classes/Contact.php';


$contact = new Contact();

$contact->setFirstName('Romain')->setLastName('Bohdanowicz');
var_dump($contact->getFirstName());