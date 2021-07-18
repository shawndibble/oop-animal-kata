<?php

use App\AnimalHandler;

require __DIR__.'/vendor/autoload.php';

$animal = $argv[2] ?? null;
$phrase = AnimalHandler::execute($argv[1], $animal);
print_r($phrase);