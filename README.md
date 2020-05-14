Laravel Database Documentation Generator
========================================
[![Maintainability](https://api.codeclimate.com/v1/badges/a99a88d28ad37a79dbf6/maintainability)](https://codeclimate.com/github/Churakovmike/laravel-db-doc-generator)
----------------------------------------------------------------------------------------------------------------------
Requirements
------------
+ laravel 5.5+
+ Doctrine/dbal
+ Tokenizer Extension

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
Run in from command-line with next command
```php
php artisan db-doc:generate
```
By default database documentation will be generate in ./public/db-doc/
If you need to change output destination, run command with --output argument
```php
php artisan db-doc:generate --output=path/to/your/destination
```
When running DbDocumentor there are some command-line options 
1. `--output`, specifies the directory to output generated documentation.
1. `--model-path`, specifies the directory for searching Eloquent model files.
1. `--excluded-dir`, specifies the directories to ignore during the search.
