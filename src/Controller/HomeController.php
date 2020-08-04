<?php

namespace App\Controller;

use Parsedown;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(CacheInterface $cache)
    {
        $topMovies = array(
            [
                'name' => 'Побег из Шоушенка',
                'description' => '_Бухгалтер_ **Энди Дюфрейн** обвинён в убийстве собственной жены и её любовника. Оказавшись в тюрьме под названием Шоушенк, он сталкивается с жестокостью и беззаконием, царящими по обе стороны решётки. Каждый, кто попадает в эти стены, становится их рабом до конца жизни. Но Энди, обладающий живым умом и доброй душой, находит подход как к заключённым, так и к охранникам, добиваясь их особого к себе расположения.',
                'image' => 'images/1.jpeg'
            ],
            [
                'name' => 'Зеленая миля',
                'description' => '`Пол Эджкомб` - начальник блока смертников в тюрьме «Холодная гора», каждый из узников которого однажды проходит «зеленую милю» по пути к месту казни. Пол повидал много заключённых и надзирателей за время работы. Однако гигант Джон Коффи, обвинённый в страшном преступлении, стал одним из самых необычных обитателей блока.',
                'image' => 'images/2.jpeg'
            ],
            [
                'name' => 'Форест Гамп',
                'description' => 'От лица главного героя Форреста Гампа, слабоумного безобидного человека с благородным и открытым сердцем, рассказывается история его необыкновенной жизни.
                        Фантастическим образом превращается он в известного футболиста, героя войны, преуспевающего бизнесмена. Он становится миллиардером, но остается таким же бесхитростным, глупым и добрым. Форреста ждет постоянный успех во всем, а он любит девочку, с которой дружил в детстве, но взаимность приходит слишком поздно.',
                'image' => 'images/3.jpeg'
            ],
        );

        $cacheKey = md5(serialize($topMovies));

        $topMovies = $cache->get($cacheKey, function () use (&$topMovies) {
            $markdownService = new Parsedown();
            foreach ($topMovies as &$movie) {
                $movie['description'] = $markdownService->text($movie['description']);
            }
        });

        return $this->render('home/homepage.html.twig', [
            'topMovies' => $topMovies
        ]);
    }
}
