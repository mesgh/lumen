<?php

$app = require __DIR__ . '/../bootstrap/app.php';

$app->get('/', function () {
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
        echo file_get_contents(basename(__FILE__));
    } else {
        echo '<h1>' . $date->getTime() . '</h1>';
    }
});

$app->run();
