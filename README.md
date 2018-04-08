# laravel-rest-server
Package rest full server for Laravel

:package_description

- [Installation](#installation)
- [Usage](#usage)

Installation
------------

To install this package you will need:

    Laravel 5 (see compatibility table)
    PHP 7.0 +


Install via composer - edit your `composer.json` to require the package.

``` json
{
    "require": {
        "prusmarcin/laravel-rest-server": "0.*"
    }
}
```

Then run `composer update` in your terminal to pull it in.

Or via the command line in the root of your application installation.

``` bash
$ composer require "prusmarcin/laravel-rest-server:0.*"
```


Once this has finished, you will need to add the service provider to the `providers` array in your `app.php` config as follows:

``` php
\Restserver\RestserverServiceProvider::class,
```

Run migration

``` bash
$ php artisan migrate
```
Run seeder

``` bash
$ php artisan db:seed --class=Restserver\\Seeds\\DatabaseSeeder
```
Run laravel on localhost
``` bash
$ php artisan serve
```
And you're done!

Usage
-----

http://localhost:8000/api/items/available
http://localhost:8000/api/items/available/5
http://localhost:8000/api/items/unavailable
