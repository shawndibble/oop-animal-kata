<?php

namespace App\Animals;

class Cow implements AnimalInterface
{
    private string $phrase = 'moo';

    public function says(): string
    {
        return $this->phrase;
    }
}
