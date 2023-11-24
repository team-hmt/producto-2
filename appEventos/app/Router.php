<?php

namespace app;

class Router {
    private $getRoutes = [];
    private $postRoutes = [];

    public function get($route, $action) {
        $this->getRoutes[$route] = $action;
    }

    public function post($route, $action) {
        $this->postRoutes[$route] = $action;
    }

    public function resolve() {
        $requestURI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if($method === 'GET') {
            if(isset($this->getRoutes[$requestURI])) {
                call_user_func($this->getRoutes[$requestURI]);
            }
        } else if($method === 'POST') {
            if(isset($this->postRoutes[$requestURI])) {
                call_user_func($this->postRoutes[$requestURI]);
            }
        }
    }
}