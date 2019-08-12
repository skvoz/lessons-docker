<?php

require __DIR__ . '/vendor/autoload.php';

use Bitverse\Identicon\Identicon;
use Bitverse\Identicon\Color\Color;
use Bitverse\Identicon\Generator\RingsGenerator;
use Bitverse\Identicon\Preprocessor\MD5Preprocessor;

$generator = new RingsGenerator();
$generator->setBackgroundColor(Color::parseHex('#EEEEEE'));

$identicon = new Identicon(new MD5Preprocessor(), $generator);

$icon = $identicon->getIcon('hello world');

file_put_contents('helloworld.svg', $icon);

echo 'Hello World! bbb!';
