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

    public function testSecondQuestion()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/cards/2/question');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Second Question?', $crawler->text());
    }

    public function testFirstAnswer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/cards/1/answer');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('First Answer.', $crawler->text());
    }

    public function testSubmittingQuestionLeadsToAnswer()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/cards/1/question');

        $ansCrawler = $client->click($crawler->selectLink('Submit')->link());

        $this->assertContains('First Answer.', $ansCrawler->text());
    }
}
