<?php
require_once 'classes/Entity/Contact.php';


$contact = new \Ajc\Entity\Contact();

$contact->setFirstName('Romain')->setLastName('Bohdanowicz');
var_dump($contact->getFirstName());