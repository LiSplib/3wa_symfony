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
     * @Route("/", name="books")
     */
    public function bookList()
    {
        return $this->render('media/book_list.html.twig');
    }

    /**
     * @Route("/show", name="show_book")
     */
    public function bookShow()
    {
        return $this->render('media/book_show.html.twig');
    }
}
