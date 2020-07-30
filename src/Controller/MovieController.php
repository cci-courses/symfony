<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController
{
    /**
     * @Route("/movie/{movieSlug}")
     */
    public function detail($movieSlug)
    {
        return new Response(sprintf(
            'The "%s" details',
            $movieSlug
        ));
    }
}
