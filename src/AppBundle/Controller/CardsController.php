<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Card;

class CardsController extends Controller
{
    /**
     * @Route("/cards/{id}/question")
     */
    public function questionAction($id)
    {
        $cards = Card::getAll();

        return $this->render('default/question.html.twig', array(
            'question' => $cards[$id]->question,
            'answerUrl' => "/cards/{$id}/answer"
        ));
    }

    /**
     * @Route("/cards/{id}/answer")
     */
    public function answerAction($id)
    {
        $cards = Card::getAll();

        return $this->render('default/answer.html.twig', array(
            'answer' => $cards[$id]->answer
        ));
    }
}
