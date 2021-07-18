# OOP Animal Kata

## Setup

* Download to a local directory and run `composer install`.

## Storing Data

* Execute `php AnimalProject.php <animal name> <animal type>`;

```
php AnimalProject.php "Mr Fluffy" cat
```
Supported animal types: Cat, Cow, Dog.

## Retrieving Data

* Data can be retrieved by omitting the animal type.

```
php AnimalProject.php "Mr Fluffy"
```

## Testing

run `./vendor/bin/phpunit tests`