<?php

echo 'Hello world';
echo PHP_EOL;
var_dump(file_exists(__DIR__.'/vendor/autoload.php'));
//echo 222;
require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application();


$app->get('/', function($name) use($app) {
    echo  'Hello world!';
});

$app->run();
