<?php

namespace Unit\Services;

use App\Animals\Cat;
use App\Services\ClassFinder;
use PHPUnit\Framework\TestCase;

class ClassFinderTest extends TestCase
{
    public function testGrabsCorrectClassName()
    {
        $response = (new ClassFinder('src/Animals'))->getByName('cat');
        $this->assertEquals(Cat::class, $response);
    }

    public function testReturnsNullIfUnavailable()
    {
        $response = (new ClassFinder('src/Animals'))->getByName('rabbit');
        $this->assertNull($response);
    }
}