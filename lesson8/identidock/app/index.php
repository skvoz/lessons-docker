<?php

use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/vendor/autoload.php';

$foo = new \App\Identidock();
$app = new Silex\Application();

$app['debug'] = true;

$salt = '1111';

$defaultName = 'John Dow';

$html = <<<HTML
<html>
<head>
<title>Identidock</title>
</head>
<body>
    <form method="POST">
        Hello <input type="text" name="name" value="{name}"/>
        <input type="submit" value="submit"/>
    </form>
    <p>You look like a:</p>
    
    <img src="/monster/{nameHash}"/>
</body>
</html>
HTML;


$redis = new Predis\Client('tcp://redis:6379');

$app->get('/', function () use ($app, $html, $defaultName, $salt) {
    $name = $defaultName;
    $hasName = md5($salt . $name);
    $html = get_content($html, [
        'name' => $name,
        'nameHash' => $hasName
    ]);

    return $html;
});

$app->post('/', function() use ($app, $html, $defaultName, $salt) {
    $name = isset($_POST['name']) ? $_POST['name'] : $defaultName;
    $hasName = md5($salt . $name);

    $html = get_content($html, [
        'name' => $name,
        'nameHash' => $hasName
    ]);

    return $html;
});

$app->get('monster/{name}', function($name) use ($app, $html, $redis) {

    $imageBase64 = $redis->get($name);
    if (!$imageBase64) {

        $client = new \GuzzleHttp\Client();

        $request = $client->get('http://dnmonster:8080/monster/' . $app->escape($name) . '?size=80');
        $body = $request->getBody();
        $imageBase64 = $body->getContents();

        $redis->set($name, $imageBase64);
    }

    $response = new Response($imageBase64, 200, ['content-type' => 'image/png'] );

    return $response;
});

$app->run();

#error handler
$app->error(function(\Exception $e) use ($app) {
    print $e->getMessage(); // Do something with $e
});

function get_content($template, $data)
{
    foreach($data as $key => $value)
    {
        $template = str_replace('{'.$key.'}', $value, $template);
    }

    return $template;
}