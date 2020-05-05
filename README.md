Laravel Database Documentation Generator
========================================

Requirements
------------
+ laravel 5.5+

Getting started
---------------

Installation
------------

The package is available on packagist.
```php
composer require churakovmike/laravel-db-doc-generator
```
or
```php
php composer.phar require churakovmike/laravel-db-doc-generator
```
Register service provider in config/app.php
```php
ChurakovMike\DbDocumentor\DbDocumentorServiceProvider::class,       
```

Usage
-----
Run in from command line with next command
```php
php artisan db-doc:generate
```
By default database documentation will be generate in ./public/db-doc/
If you need to change output destination, run commad with --output argument
```php
php artisan db-doc:generate --output=path/to/your/destination
```
