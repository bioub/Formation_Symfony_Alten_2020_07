<?php

use \Ajc\Entity\Company;
use \Ajc\Entity\Contact;

require_once 'vendor/autoload.php';
//require_once 'classes/Entity/Contact.php';
//require_once 'classes/Entity/Company.php';

// Nom simple : Company
// Fully Qualified ClassName (FQCN ou FQN) : nom avec les préfixes
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