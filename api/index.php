<?php

require __DIR__.'/../vendor/autoload.php';

$api = new Bramus\Router\Router;

$api->post('/login', function() {
    echo json_encode([
        'message' => 'Hello World!'
    ]);
});

$api->post('/signup', function () {
    echo json_encode([
        'message' => 'Hello World!'
    ]);
});

$api->run();
