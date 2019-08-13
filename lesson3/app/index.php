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

$app->get('monster/{name}', function($name) use ($app) {
    $request = new \GuzzleHttp\Psr7\Request('GET', 'http://0.0.0.0:9991/monster/' . $app->escape($name) . '?size80');
    $image = $request->getBody()->getContents();
    var_dump($image);
    die;
    return new Response($image, 200, ['mimetype' => 'image/png'] );
});
$app->run();

#error handler
$app->error(function(\Exception $e) use ($app) {
    print $e->getMessage(); // Do something with $e
});

