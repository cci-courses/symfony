<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return $this->render('home/homepage.html.twig', [
            'top_movies' => array(
                'Фильм 1',
                'Фильм 2',
                'Фильм 3',
                'Фильм 4',
            )
        ]);
    }
}
