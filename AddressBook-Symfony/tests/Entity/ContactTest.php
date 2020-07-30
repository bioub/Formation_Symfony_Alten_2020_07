<?php

namespace App\Tests\Entity;

use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    public function testGetSetFirstName()
    {
        $contact = new Contact();
        $contact->setFirstName('Romain');

        $this->assertEquals('Romain', $contact->getFirstName());
    }
}
