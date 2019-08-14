<?php

use Symfony\Component\HttpFoundation\Response;

require __DIR__ . '/vendor/autoload.php';

ini_set('display_errors', 1);
error_reporting(-1);

$identicon = new \Identicon\Identicon();

//$imageDataUri = $identicon->getImageDataUri($foo);

$app = new Silex\Application();

$app['debug'] = true;


$html = <<<HTML
<html>
<head>
<title>Identidock</title>
</head>
<body>
    <form method="POST">
        Hello <input type="text" name="name" value=""/>
        <input type="submit" value="submit"/>
    </form>
    <p>You look like a:</p>
    
    <img src="/foo/bar.im"/>
</body>
</html>
HTML;



$app->get('/', function ($name = null) use ($app, $html) {
    return $html;
});

$app->get('monster/{name}', function($name) use ($app, $html) {
    $client = new \GuzzleHttp\Client();
    $request = $client->get('http://0fd671a5ac41:8080/monster/' . $app->escape($name) . '?size=80');
    $body = $request->getBody();
    $imageBase64 = $body->getContents();
    $response = new Response($imageBase64, 200, ['content-type' => 'image/png'] );
});

$app->run();

#error handler
$app->error(function(\Exception $e) use ($app) {
    print $e->getMessage(); // Do something with $e
});

