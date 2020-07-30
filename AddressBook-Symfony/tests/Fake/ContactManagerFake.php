<?php


namespace App\Tests\Fake;


use App\Entity\Contact;
use App\Manager\ContactManager;
use Doctrine\Persistence\ManagerRegistry;

class ContactManagerFake extends ContactManager
{


    public function findAll() {
        return [
            (new Contact())->setId(1)->setFirstName('A')->setFirstName('B'),
            (new Contact())->setId(1)->setFirstName('C')->setFirstName('D'),
        ];
    }
}