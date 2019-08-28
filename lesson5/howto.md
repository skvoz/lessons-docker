##HOWTO: add testable env, add CI

- ####run tests command
> php <phpunit_runner> --configuration <configuration> --testsuite <folder>

> example: $ php phpunit.phar --configuration phpunit.xml --testsuite class

> example: $ vendor/bin/phpunit -c --configuration phpunit.xml --testsuite class
         
##Note

This code based on lesson3 