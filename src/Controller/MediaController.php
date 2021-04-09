<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/medias")
 */

class MediaController extends AbstractController
{
    /**
     * @Route("/", name="medias")
     */
    public function mediaList()
    {
        return $this->render('media/index.html.twig');
    }

    /**
     * @Route("/show", name="show_media")
     */
    public function mediaShow(): Response
    {
        return $this->render('media/show.html.twig', [
            'controller_name' => 'MediaController',
        ]);
    }
}
