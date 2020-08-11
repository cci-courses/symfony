<?php

namespace App\Controller;

use App\Entity\Movie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        $repository = $this->getDoctrine()->getRepository(Movie::class);

        return $this->render('home/homepage.html.twig', [
            'topMovies' => $repository->findAll()
        ]);
    }
}
