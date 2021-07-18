<?php


namespace App;
use App\Animals\AnimalInterface;
use App\Services\ClassFinder;
use App\Services\CacheService;
use ICanBoogie\Inflector;

class AnimalHandler
{
    private string $name;
    private ?string $animal;

    public static function execute(string $name, string $animal = null): string
    {
        return (new self($name, $animal))->process();
    }

    public function __construct(string $name, string $animal = null)
    {
        $this->name = $name;
        $this->animal = $animal;
    }

    public function process(): string
    {
        // Store/retrieve records
        if (!is_null($this->animal)) {
            CacheService::store($this->name, $this->animal);
        } else {
            $this->animal = CacheService::retrieve($this->name);
        }

        // If no animal passed/retrieved, output an error
        if (is_null($this->animal)) {
            return "No records found for $this->name";
        }

        // Grab our class & initialize it if we have one.
        $fetchedClass = (new ClassFinder('src/Animals'))->getByName($this->animal);
        $animalClass = $fetchedClass ? new $fetchedClass : null;

        // Output the result
        return $this->output($animalClass);
    }

    public function output(?AnimalInterface $animalClass): string
    {
        if (!$animalClass) {
            $pluralName = (Inflector::get('en'))->pluralize($this->animal);
            return ucfirst($pluralName) . ' are not real';
        }

        $phrase = $animalClass->says();
        return "$this->name says $phrase";
    }
}