<?php

$app = require __DIR__.'/../bootstrap/app.php';

$app->get('/', function () {

    return '<h1>'.date('r').'</h1>';
});

$app->run();
