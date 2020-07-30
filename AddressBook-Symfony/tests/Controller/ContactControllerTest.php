<?php

namespace App\Tests\Controller;

use App\Entity\Contact;
use App\Manager\ContactManager;
use App\Tests\Fake\ContactManagerFake;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function setUp(): void
    {
        // relancer ma commande fixture:load
        // var_dump(exec('bin/console fixture:load fixture/dev.yaml -t'));
    }

    public function testListRouteFake()
    {
        $client = static::createClient();

        // Créer un faux ContactManager
        // remplacer dans le container la clé ContactManager par notre faux
        $client->getContainer()->set(ContactManager::class, new ContactManagerFake());

        $crawler = $client->request('GET', '/contacts/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Contacts list');

        $this->assertCount(2, $crawler->filter('table > tbody > tr'));
    }

    public function testListRouteMockPhpUnit()
    {
        $client = static::createClient();

        $mock = $this->getMockBuilder(ContactManager::class)
             ->disableOriginalConstructor()
             ->getMock();

        $mock->expects($this->once())
             ->method('findAll')
             ->willReturn([
                 (new Contact())->setId(1)->setFirstName('A')->setFirstName('B'),
                 (new Contact())->setId(1)->setFirstName('C')->setFirstName('D'),
             ]);

        // Créer un faux ContactManager
        // remplacer dans le container la clé ContactManager par notre faux
        $client->getContainer()->set(ContactManager::class, $mock);

        $crawler = $client->request('GET', '/contacts/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Contacts list');

        $this->assertCount(2, $crawler->filter('table > tbody > tr'));
    }

    public function testListRouteMockProphecy()
    {
        $client = static::createClient();

        $mock = $this->prophesize(ContactManager::class);

        $mock->findAll()->willReturn([
            (new Contact())->setId(1)->setFirstName('A')->setFirstName('B'),
            (new Contact())->setId(1)->setFirstName('C')->setFirstName('D'),
        ])->shouldBeCalledOnce();

        // Créer un faux ContactManager
        // remplacer dans le container la clé ContactManager par notre faux
        $client->getContainer()->set(ContactManager::class, $mock->reveal());

        $crawler = $client->request('GET', '/contacts/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Contacts list');

        $this->assertCount(2, $crawler->filter('table > tbody > tr'));
    }

    public function testListRouteSpyProphecy()
    {
        $client = static::createClient();

        $spy = $this->prophesize(ContactManager::class);

        $spy->findAll()->willReturn([
            (new Contact())->setId(1)->setFirstName('A')->setFirstName('B'),
            (new Contact())->setId(1)->setFirstName('C')->setFirstName('D'),
        ]);

        // Créer un faux ContactManager
        // remplacer dans le container la clé ContactManager par notre faux
        $client->getContainer()->set(ContactManager::class, $spy->reveal());

        $crawler = $client->request('GET', '/contacts/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Contacts list');
        $this->assertCount(2, $crawler->filter('table > tbody > tr'));
        $spy->findAll()->shouldHaveBeenCalledTimes(1);
    }

}
