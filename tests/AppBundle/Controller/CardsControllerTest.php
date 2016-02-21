<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CardsControllerTest extends WebTestCase
{
    public function testFirstQuestion()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/cards/1/question');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('First Question?', $crawler->text());
    }
}
