<?php

namespace App\Animals;

class Dog implements AnimalInterface
{
    private string $phrase = 'woof';

    public function says(): string
    {
        return $this->phrase;
    }
}