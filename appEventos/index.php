<?php

include_once 'config/config.php';

include_once APPROOT . 'app/Auth.php';
include_once APPROOT . 'app/Router.php';

include_once APPROOT . 'app/controllers/RegisterController.php';
include_once APPROOT . 'app/controllers/LoginController.php';
include_once APPROOT . 'app/controllers/ActosController.php';

use app\Auth;
use app\Router;

use app\controllers\ActosController;
use app\controllers\LoginController;
use app\controllers\RegisterController;

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

Router::get("/login", function() {
    $controller = new LoginController();
    $controller->show();
});

Router::post("/login", function() {
    $controller = new LoginController();
    $controller->handleLoginSubmission();
});

Router::get("/registro", function() {
    $controller = new RegisterController();
    $controller->show();
});

Router::post("/registro", function() {
    $controller = new RegisterController();
    $controller->handleRegistroSubmission();
});

Router::get("/logout", function() {
    Auth::logout();
});

Router::get("/movies", function() {
    $controller = new ActosController();
    $controller->list();
});

Router::get("/movie", function() {
    $controller = new ActosController();
    $controller->show();
});

Router::post("/inscribe", function() {
    $controller = new ActosController();
    $controller->subscribe();
});

Router::get("/", function() {
    Router::redirect("/movies", null);
});

Router::resolve();