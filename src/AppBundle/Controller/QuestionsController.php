<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class QuestionsController extends Controller
{
    /**
     * @Route("/questions/{id}")
     */
    public function indexAction($id)
    {
        return $this->render('default/questions.html.twig');
    }
}
