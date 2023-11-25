<?php

namespace app\controllers;
use app\Router;
use JetBrains\PhpStorm\NoReturn;

class ActosController
{
    private const itemsPerPage = 25;

    /**
     * GET
     * @return void
     */
    public function list(): void
    {
        // Get user's current page
        // Get Db events count
        // Count pages
        // Get db models
        // Show view

        if ($result = Router::read())
        {
            $params["message"] = $result;
        }

        // MOCK
        $params["movies"] = [
            [
                "id" => 1,
                "title" => "Napoleón",
                "short_description" => "Napoleón es un espectáculo lleno de épica y acción que detalla el enrevesado ascenso y caída del icónico Emperador francés Napoleón Bonaparte, interpretado por el ganador del Oscar® Joaquim Phoenix.",
                "long_description" => "Napoleón es un espectáculo lleno de épica y acción que detalla el enrevesado ascenso y caída del icónico Emperador francés Napoleón Bonaparte, interpretado por el ganador del Oscar® Joaquim Phoenix. Tras un rodaje orquestado por el legendario director Ridley Scott sobre un deslumbrante telón de fondo a gran escala, la película muestra la incesante carrera de Bonaparte hasta el poder, a través del prisma de la adictiva y volátil relación con Josefina, la que fue su único amor verdadero, presentando sus visionarias tácticas políticas y militares a través de algunas de las secuencias prácticas de batallas más dinámicas jamás filmadas.",
                "img" => "https://www.ocinegirona.es/images/pelicules/5940.jpg"
            ],
            [
                "id" => 2,
                "title" => "Black Friday",
                "short_description" => "Tras un Black Friday en el que se producen disturbios que acaban en tragedia, un misterioso asesino aterroriza Plymouth, en Massachusetts. ",
                "long_description" => "Tras un Black Friday en el que se producen disturbios que acaban en tragedia, un misterioso asesino aterroriza Plymouth, en Massachusetts. ",
                "img" => "https://www.ocinegirona.es/images/pelicules/5879.jpg"
            ],
        ];


        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $eventsCount = 25;
        $totalPages = ceil($eventsCount / self::itemsPerPage);

        require(APPROOT . 'app/views/actos/list.php');
    }

    /**
     * POST
     * @return void
     */
    #[NoReturn] public function subscribe(): void
    {
        // TODO
        // Get request movie id
        // Get movie
        // Check if user subsribed
        // Subscribe

        Router::redirect("/movies", "Ya te has suscrito");
    }

    /**
     * GET
     * @return void
     */
    public function show(): void
    {
        require(APPROOT . 'app/views/actos/show.php');
    }
}