#!/bin/bash

set -e

if ["$ENV" = 'DEV']; then
    echo 'Running Development Server'
    exec php -S localhost:5000 '/app/identidock.php'
else
    echo 'Running Production Server'
    exec php -S localhost:5000 '/app/identidock.php'
