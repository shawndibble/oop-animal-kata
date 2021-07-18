<?php

namespace Functional;

use App\AnimalHandler;
use PHPUnit\Framework\TestCase;

class AnimalHandlerTest extends TestCase
{
    public function testCanCallAnAnimalWithAName(): void
    {
        $phrase = (new AnimalHandler('Mr. Meows-a-lot', 'cat'))->process();
        $this->assertEquals('Mr. Meows-a-lot says meow', $phrase);
    }

    public function testCanHandleInvalidAnimalType(): void
    {
        $phrase = (new AnimalHandler('Sparkly Horse', 'unicorn'))->process();
        $this->assertEquals('Unicorns are not real', $phrase);
    }

    public function testExecuteReturnsTheSameResponseAsOutput(): void
    {
        $phrase = AnimalHandler::execute('Scruff McGruff', 'dog');
        $this->assertEquals('Scruff McGruff says woof', $phrase);
    }

    public function testAnimalHandlerStoresRecord(): void
    {
        // setup initial storage.
        AnimalHandler::execute('Scruff McGruff', 'dog');

        // make call that should retrieve the correct type.
        $phrase = AnimalHandler::execute('Scruff McGruff');
        $this->assertEquals('Scruff McGruff says woof', $phrase);
    }

    public function testAnimalHandlerCanUpdateRecord(): void
    {
        // setup initial storage.
        AnimalHandler::execute('Scruff McGruff', 'dog');
        // override animal type
        AnimalHandler::execute('Scruff McGruff', 'cat');

        // see we get the updated response
        $phrase = AnimalHandler::execute('Scruff McGruff');
        $this->assertEquals('Scruff McGruff says meow', $phrase);
    }

    public function testReturnsNoDataMessageIfNothingWasStored(): void
    {
        $phrase = AnimalHandler::execute('Willy Wonka');
        $this->assertEquals('No records found for Willy Wonka', $phrase);
    }
}