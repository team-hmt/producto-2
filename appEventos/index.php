<?php

include_once 'config/config.php';
include_once APPROOT . 'app/controllers/Auth.php';
include_once APPROOT . 'app/Router.php';

use app\controllers\Auth;
use app\Router;

$router = new Router();

$router->get("/login", function() {
    $authController = new Auth();
    $authController->login_get();
});

$router->post("/login", function() {
    $authController = new Auth();
    $authController->login_post();
});


$router->resolve();