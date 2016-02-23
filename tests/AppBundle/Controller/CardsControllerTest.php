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

    /**
     * @dataProvider answersOfQuestions
     */
    public function testSubmittingQuestionLeadsToRightAnswer($questionUrl, $answer)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', $questionUrl);

        $ansCrawler = $client->click($crawler->selectLink('Submit')->link());

        $this->assertContains($answer, $ansCrawler->text());
    }

    public function answersOfQuestions()
    {
        return array(
                'first' => array('/cards/1/question', 'First Answer.'),
                'second' => array('/cards/2/question', 'Second Answer.'),
                );
    }
}
