# Laravel Simple Table

This library will display a table with features: 

1. Searching columns
2. Filtering columns

## Features

✅ Lightweight & Efficient – Only uses Blade, no Livewire/JS overhead.

✅ Extendable – Users can override query logic via SimpleTableQuery.

✅ Easy to Use – Works with any Eloquent model.

✅ Built-in Sorting & Searching – Without extra dependencies.

✅ Customizable View – Users can override the Blade template.

## Structure

````
aifaiz/simple-table
│── src/
│   ├── Base/
│   │   ├── SimpleTableQuery.php
│   ├── View/
│   │   ├── Components/
│   │   │   ├── SimpleTable.php
│   │   ├── simple-table.blade.php
│   ├── SimpleTableServiceProvider.php
│── routes/web.php
│── composer.json
│── README.md
````

## Installation

````
composer require aifaiz/simple-table
````

## Publish Views (optional)
you can publish views if you need to further customize your eloquent table

````
php artisan vendor:publish --tag=simple-table-views
````