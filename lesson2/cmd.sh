#!/bin/sh
set -e

PHP=php

if [ "$ENV" = 'DEV' ]; then
    echo "Running Development Server"
    $PHP -S 0.0.0.0:5000 $(pwd)/identidock.php
else
    echo "Running Production Server"
    $PHP -S 0.0.0.0:5000 $(pwd)/identidock.php
fi