<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class QuestionsControllerTest extends WebTestCase
{
    public function testFirst()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/questions/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('First Question?', $crawler->text());
    }
}
