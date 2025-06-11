# Pest plugin for Laravel development

[![Latest Version on Packagist](https://img.shields.io/packagist/v/soyhuce/pest-plugin-laravel.svg?style=flat-square)](https://packagist.org/packages/soyhuce/pest-plugin-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/soyhuce/pest-plugin-laravel/tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/soyhuce/pest-plugin-laravel/actions/workflows/tests.yml)
[![GitHub static analysis Action Status](https://img.shields.io/github/actions/workflow/status/soyhuce/pest-plugin-laravel/static.yml?branch=main&label=static&style=flat-square)](https://github.com/soyhuce/pest-plugin-laravel/actions/workflows/static.yml)
[![GitHub Pint Action Status](https://img.shields.io/github/actions/workflow/status/soyhuce/pest-plugin-laravel/pint.yml?branch=main&label=pint&style=flat-square)](https://github.com/soyhuce/pest-plugin-laravel/actions/workflows/pint.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/soyhuce/pest-plugin-laravel.svg?style=flat-square)](https://packagist.org/packages/soyhuce/pest-plugin-laravel)

## Installation

You can install the package via composer:

```bash
composer require soyhuce/pest-plugin-laravel --dev
```

## Usage

### Expectations

- `toBeModel` expects that the value matches current model
```php
expect($model)->toBeModel($expectedModel)
```

- `toBeCollection` expects that the collection matches current collection
```php
expect($collection)->toBeCollection(new Collection([1,2,3]));
/// Expected collection can be given as array
expect($collection)->toBeCollection([1,2,3]);
```
Keys and order of the collections are checked and must match.

- `toBeCollectionCanonicalizing` expects that the collection matches current collection, ignoring order
```php
expect($collection)->toBeCollectionCanonicalizing(new Collection([1,2,3]));
/// Expected collection can be given as array
expect($collection)->toBeCollectionCanonicalizing([3,1,2]);
```
Keys of the collections are checked and must match.

- `toBeAbleTo` expect that the autenticatable can perform the given action
```php
expect($user)->toBeAbleTo('update', $post);
```

#### Data expectations : require `spatie/laravel-data` package

- `toBeData` expects that the value matches current data object
```php
expect($data)->toBeData(new UserData(['name' => 'John Doe']));
```

- `toBeDataCollection` expects that the collection matches current data collection
```php
expect($dataCollection)->toBeDataCollection(new UserDataCollection([
    new UserData(['name' => 'John Doe']),
    new UserData(['name' => 'Jane Doe']),
]));

// Expected collection can be given as array
expect($dataCollection)->toBeDataCollection([['name' => 'John Doe'], ['name' => 'Jane Doe']]);
```
