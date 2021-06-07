<?php

$router->get('/', function () use ($router) {
    $date = new class
    {
        function getTime()
        {
            return date('d/m/Y H:i');
        }
    };

    if (isset($_GET['print'])) {
        header('Content-Type: text/plain; charset=utf-8');
        if (isset($_GET['public'])) {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET, POST, DELETE');
        }
        return file_get_contents(basename(__FILE__));
    } else {
        return '<h1>' . $date->getTime() . '</h1>';
    }
});
$router->get('/hello/{name}', function ($name) {
    return '<h1>Hello ' . $name . '!</h1>';
});
$router->get('/date', function () {
    return '<h1>' . date('r') . '</h1>';
});
