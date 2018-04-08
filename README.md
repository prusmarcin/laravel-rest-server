# laravel-rest-server
Package rest full server for Laravel

[![Build Status](http://img.shields.io/travis/prusmarcin/laravel-rest-server.svg)](https://travis-ci.org/prusmarcin/laravel-rest-server)
[![Total Downloads](http://img.shields.io/packagist/dm/prusmarcin/laravel-rest-server.svg)](https://packagist.org/packages/prusmarcin/laravel-rest-server)
[![Latest Stable Version](http://img.shields.io/packagist/v/prusmarcin/laravel-rest-server.svg)](https://packagist.org/packages/prusmarcin/laravel-rest-server)
[![License](http://img.shields.io/badge/license-MIT-lightgrey.svg)](https://github.com/prusmarcin/laravel-rest-server/blob/master/LICENSE)

:package_description

- [Installation](#installation)
- [Usage](#usage)
- [Author](#author)
- [License](#license)

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

And configure the database connection in `.env` file for your Laravel installation.

Run migration

``` bash
$ php artisan migrate
```
Run seeder

``` bash
$ php artisan db:seed --class=Restserver\\Seeds\\DatabaseSeeder
```

Run laravel server
``` bash
$ php artisan serve
```
And you're done!

Usage
-----

http://localhost:8000/api/items/available

Returns

``` json
[{"id":5,"name":"Produkt 8","amount":2},{"id":4,"name":"Produkt 7","amount":6},{"id":2,"name":"Produkt 2","amount":12},{"id":1,"name":"Produkt 1","amount":4}]
```

http://localhost:8000/api/items/available/5
http://localhost:8000/api/items/unavailable


Author
-------

- [Prus Marcin](https://github.com/prusmarcin)
- [Portfolio](https://prusmarcin.pl/)


License
-------

The MIT License (MIT). Please see [License File](https://github.com/prusmarcin/laravel-rest-server/blob/master/LICENSE) for more information.