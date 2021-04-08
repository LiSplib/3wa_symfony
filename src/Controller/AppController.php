<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AppController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function homepage(): Response
    {
        return $this->render('app/index.html.twig');
    }

    /**
     * @Route("/presentation", name="presentation")
     */
    public function presentation(): Response
    {
        return $this->render('app/presentation.html.twig');
    }

    /**
     * @Route("/show/media", name="show_media")
     */
    public function showMedia(): Response
    {
        return $this->render('show_media/home.html.twig');
    }

}