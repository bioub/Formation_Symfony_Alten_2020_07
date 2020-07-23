<?php

require_once 'classes/Contact.php';
require_once 'classes/Company.php';

$company = new Company();
$company->setName('formation.tech')->setCity('Paris');

$contact = new Contact();
$contact->setFirstName('Romain')->setLastName('Bohdanowicz');
$contact->setCompany($company);

echo 'Société : ' . $contact->getCompany()->getName() . "\n";
// include 'template_contact_details.php';


$company->addContact($contact);

foreach ($company->getContacts() as $c) {
    echo 'Contact : ' . $c->getFirstName() . "\n";
}