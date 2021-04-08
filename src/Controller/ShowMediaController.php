<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowMediaController extends AbstractController
{
    /**
     * @Route("/show/media", name="show_media")
     */
    public function index(): Response
    {
        return $this->render('show_media/index.html.twig', [
            'controller_name' => 'ShowMediaController',
        ]);
    }
}
