<?php

namespace Unit\Services;

use App\Services\CacheService;
use PHPUnit\Framework\TestCase;

class CacheServiceTest extends TestCase
{
    public function testCanStoreRetrieveData()
    {
        CacheService::store('Mr. Munster', 'cow');
        $this->assertEquals('cow', CacheService::retrieve('Mr. Munster'));
    }

    public function testReturnsNullForInvalidKey()
    {
        $this->assertNull(CacheService::retrieve('Invalid'));
    }
}