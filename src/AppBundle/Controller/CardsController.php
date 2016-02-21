<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CardsController extends Controller
{
    /**
     * @Route("/cards/{id}/question")
     */
    public function questionAction($id)
    {
        return $this->render('default/question.html.twig');
    }

    /**
     * @Route("/cards/{id}/answer")
     */
    public function answerAction($id)
    {
        return $this->render('default/answer.html.twig');
    }
}
