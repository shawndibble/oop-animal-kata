<?php

namespace App\Services;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class CacheService
{
    public ?FilesystemAdapter $cache = null;

    public function __construct()
    {
        $this->cache = new FilesystemAdapter();
    }

    public function getCache(): ?FilesystemAdapter
    {
        return $this->cache;
    }

    public static function store($key, $value): bool
    {
        $cache = (new self)->getCache();
        $record = $cache->getItem($key);
        $record->set($value);
        return $cache->save($record);
    }

    public static function retrieve($key)
    {
        $cache = (new self)->getCache();
        return $cache->getItem($key)->get();
    }
}