<?php

namespace App\Tests\Controller;

use App\Entity\Company;
use App\Manager\CompanyManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CompanyControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $mock = $this->prophesize(CompanyManager::class);

        $mock->findAll()->willReturn([
            (new Company())->setId(1)->setName('A'),
            (new Company())->setId(2)->setName('B'),
        ])->shouldBeCalledTimes(2); // called in the menu + list

        $client->getContainer()->set(CompanyManager::class, $mock->reveal());

        $crawler = $client->request('GET', '/companies/');

        $this->assertResponseIsSuccessful();
        $this->assertCount(2, $crawler->filter('.list-group-item'));
    }

    public function testShow()
    {
        $client = static::createClient();

        $mock = $this->prophesize(CompanyManager::class);

        $mock->findAll()->willReturn([
            (new Company())->setId(1)->setName('A'),
            (new Company())->setId(2)->setName('B'),
        ])->shouldBeCalledTimes(1); // called in the menu

        $mock->find('123')->willReturn(
            (new Company())->setId(123)->setName('Acme')
        )->shouldBeCalledTimes(1);

        $client->getContainer()->set(CompanyManager::class, $mock->reveal());

        $crawler = $client->request('GET', '/companies/123/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2 + p', 'Acme');
    }
}
