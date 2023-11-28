<?php

namespace app;

use JetBrains\PhpStorm\NoReturn;

class Router {
    private static array $getRoutes = [];
    private static array $postRoutes = [];

    public static function get(string $route, callable $action): void
    {
        self::$getRoutes[$route] = $action;
    }

    public static function post(string $route, callable $action): void
    {
        self::$postRoutes[$route] = $action;
    }

    #[NoReturn] public static function redirect(string $url, mixed $params): void
    {
        if (isset($params) && $params != null) {
            $_SESSION['flash_message'] = $params;
        }

        header('Location: ' . $url);
        exit();
    }

    public static function read() : mixed
    {
        if (isset($_SESSION['flash_message']))
        {
            $result = $_SESSION['flash_message'];
            unset($_SESSION['flash_message']);
            return $result;
        }
        return null;
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