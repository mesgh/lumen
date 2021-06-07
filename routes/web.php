<?php

use Illuminate\Http\Response;

$router->get('/', function () use ($router) {
  $date = new class
  {
    function getTime()
    {
      return date('d/m/Y H:i');
    }
  };
  return '<h1>' . $date->getTime() . '</h1>';
});

$router->get('/print', function () use ($router) {
  return (new Response(file_get_contents(__FILE__), 200))
    ->header('Content-Type', 'text/plain; charset=utf-8');
});

$router->get('/print/public', function () use ($router) {
  return (new Response('<h1>' . date('r') . '</h1>', 200))
    ->header('Content-Type', 'text/plain; charset=utf-8')
    ->header('Access-Control-Allow-Origin', '*')
    ->header('Access-Control-Allow-Methods', 'GET, POST, DELETE');
});

$router->get('/hello/{name}', function ($name) {
  return '<h1>Hello ' . $name . '!</h1>';
});

$router->get('/date', function () {
  return '<h1>' . date('r') . '</h1>';
});
