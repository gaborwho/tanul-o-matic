<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CardsControllerTest extends WebTestCase
{
    /**
     * @dataProvider contents
     */
    public function testContent($url, $text)
    {
        $client = static::createClient();

        $crawler = $client->request('GET', $url);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains($text, $crawler->text());
    }

    public function contents()
    {
        return array(
            'first question' => array('/cards/1/question', 'First Question?'),
            'second question' => array('/cards/2/question', 'Second Question?'),
            'first answer' => array('/cards/1/answer', 'First Answer.'),
            'second answer' => array('/cards/2/answer', 'Second Answer.'),
        );
    }

    public function testSubmittingQuestionLeadsToAnswer()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/cards/1/question');

        $ansCrawler = $client->click($crawler->selectLink('Submit')->link());

        $this->assertContains('First Answer.', $ansCrawler->text());
    }
}
