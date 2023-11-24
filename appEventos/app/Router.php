<?php

namespace app;

class Router {
    private static array $getRoutes = [];
    private static array $postRoutes = [];

    public static function get($route, $action): void
    {
        self::$getRoutes[$route] = $action;
    }

    public static function post($route, $action): void
    {
        self::$postRoutes[$route] = $action;
    }

    public function redirect($url): void
    {
        header('Location: ' . $url);
        exit();
    }

    public static function resolve(): void
    {
        $requestURI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if($method === 'GET') {
            if(isset(self::$getRoutes[$requestURI])) {
                call_user_func(self::$getRoutes[$requestURI]);
            }
        } else if($method === 'POST') {
            if(isset(self::$postRoutes[$requestURI])) {
                call_user_func(self::$postRoutes[$requestURI]);
            }
        }
    }
}