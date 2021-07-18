<?php

namespace App\Services;

use Symfony\Component\Finder\Finder;

class ClassFinder
{
    private Finder $iterator;

    public function __construct(string $path)
    {
        $this->iterator = (new Finder)->files()->in($path);
    }

    public function getByName(string $name): ?string
    {
        foreach ($this->iterator as $class) {
            if ($class->getFilenameWithoutExtension() == ucfirst($name)) {
                $namespaceWithBackslashes = str_replace('/', '\\', $class->getPath());
                $namespaceApp = str_replace('src', 'App', $namespaceWithBackslashes);
                return $namespaceApp . '\\' . $class->getFilenameWithoutExtension();
            }
        }
        return null;
    }
}