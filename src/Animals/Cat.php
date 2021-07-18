<?php

namespace App\Animals;

class Cat implements AnimalInterface
{
    private string $phrase = 'meow';

    public function says(): string
    {
        return $this->phrase;
    }
}