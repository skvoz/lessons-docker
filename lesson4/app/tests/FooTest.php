<?php

namespace Tests;

use App\Identidock;
use PHPUnit\Framework\TestCase;

class FooTest extends TestCase
{
    public function testFoo()
    {
        $inst = new Identidock();

        $this->assertTrue($inst->foo());
    }
}