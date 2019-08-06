<?php

require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application();


$app->get('/', function($name) use($app) {
    echo  'Hello world!';
    die;
});

$app->run();
