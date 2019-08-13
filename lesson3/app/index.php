<?php
echo '<pre>';
var_dump(scandir(__DIR__));
var_dump(scandir(__DIR__ . '/..'));
echo '</pre>';
require __DIR__ . '/vendor/autoload.php';

$identicon = new \Identicon\Identicon();

$identicon->displayImage('foo');

$imageDataUri = $identicon->getImageDataUri('bar');

?>
<img src="<?php echo $imageDataUri; ?>" alt="bar Identicon" />