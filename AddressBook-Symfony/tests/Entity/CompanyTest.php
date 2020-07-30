<?php

namespace App\Tests\Entity;

use App\Entity\Company;
use Doctrine\Common\Collections\Collection;
use PHPUnit\Framework\TestCase;

class CompanyTest extends TestCase
{
    protected $company;

    public function setUp()
    {
        $this->company = new Company();
    }

    public function testInitialProps()
    {
        $this->assertNull($this->company->getId());
        $this->assertNull($this->company->getName());
        $this->assertNull($this->company->getCity());
        $this->assertEmpty($this->company->getContacts());
        $this->assertInstanceOf(Collection::class, $this->company->getContacts());
    }

    public function testGetSetName()
    {
        $this->assertEquals($this->company, $this->company->setName('Acme'));
        $this->assertEquals('Acme', $this->company->getName());
    }
}
