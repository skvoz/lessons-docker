#!/bin/sh
set -e

PHP=php

CMD=$1
if [ "$ENV" = 'DEV' ]; then
    echo "Running Development Server"
    $PHP -S 0.0.0.0:5000 $(pwd)/index.php
elif [ "$ENV" = 'UNIT' ]; then
    echo "Running Unit Tests"
    $PHP /app/vendor/bin/phpunit --configuration phpunit.xml --testsuite general
elif [ "$ENV" = 'PROD' ]; then
    echo "Running Production Server"
    $PHP -S 0.0.0.0:5000 $(pwd)/index.php
else
    echo "execute bash"
    eval "'$CMD'"
fi