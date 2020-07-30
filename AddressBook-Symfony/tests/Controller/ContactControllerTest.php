<?php

namespace App\Tests\Controller;

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

    public function testListRoute()
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

}
