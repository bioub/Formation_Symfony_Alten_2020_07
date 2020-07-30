<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IndexControllerTest extends WebTestCase
{
    public function testHelloRoute()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/hello/Romain');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHasHeader('Content-type', 'application/json');
        $this->assertJson('{"message": "Hello Romain"}', $client->getResponse()->getContent());
    }
}
