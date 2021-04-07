<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class AppController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function homepage(): Response
    {
        return $this->render('app/index.html.twig');
    }

}