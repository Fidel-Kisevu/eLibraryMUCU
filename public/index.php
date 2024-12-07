<?php
// public/index.php

require_once '../app/core/Router.php';
require_once '../app/controllers/AuthController.php';

$router = new Router();

// Define routes
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@login');
$router->get('/register', 'AuthController@register');
$router->post('/register', 'AuthController@register');
$router->get('/logout', 'AuthController@logout');

$router->run();
?>
