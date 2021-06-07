<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/hello/{name}', function ($name) {
    return '<h1>Hello '. $name .'!</h1>';
});
$router->get('/date', function () {
    return '<h1>'.date('r').'</h1>';
});

