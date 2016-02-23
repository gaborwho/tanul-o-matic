<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CardsController extends Controller
{
    /**
     * @Route("/cards/{id}/question")
     */
    public function questionAction($id)
    {
        $questions = array(
            1 => 'First Question?',
            2 => 'Second Question?',
        );

        return $this->render('default/question.html.twig', array('question' => $questions[$id]));
    }

    /**
     * @Route("/cards/{id}/answer")
     */
    public function answerAction($id)
    {
        return $this->render('default/answer.html.twig');
    }
}
