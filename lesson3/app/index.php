<?php

require __DIR__ . '/vendor/autoload.php';

$identicon = new \Identicon\Identicon();
$foo = 'Hello world!';

$imageDataUri = $identicon->getImageDataUri($foo);
?>
<h1><?php echo $foo?></h1>

<img src="<?php echo $imageDataUri; ?>" alt="bar Identicon" />