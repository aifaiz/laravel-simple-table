`status`: havent publish to packagist. this is still in testing

# Laravel Simple Table

This library will display a table with default features: 

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
havent published to packagist yet. so you need to modify the `composer.json` file with this

````
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/aifaiz/laravel-simple-table"
        }
    ],
    "require": {
        "aifaiz/laravel-simple-table": "dev-main"
    }
}

````

Then run 

````
composer require aifaiz/simple-table
````

## Publish Views (optional)
you can publish views if you need to further customize your eloquent table or table styling. this will publish view file to `views/vendor/simple-table/table.blade.php`

````
php artisan vendor:publish --tag=simple-table-views
````

## Modify Eloquent query for the table

you can extend the functionality/query of the table by extending the `SimpleTableQuery`

````
namespace App\Tables;

use Aifaiz\SimpleTable\Base\SimpleTableQuery;
use Illuminate\Http\Request;

class OrderTableQuery extends SimpleTableQuery
{
    public function applyFilters(Request $request): \Illuminate\Database\Eloquent\Builder
    {
        $query = parent::applyFilters($request);

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        return $query;
    }
}
````

## Usage

Use the blade table component in any views

````
<x-simple-table 
    model="App\Models\Order"
    :columns="['id', 'customer_name', 'total_amount', 'status']"
    queryClass="App\Tables\OrderTableQuery"
/>

````

## Action Column

create a `action-column.blade.php` file in `views/vendor/simple-table/` then the table will display the action column. the content of the view like this:

````
<a href="#{{ $row->id }}" class="px-2 py-1 bg-blue-500 text-white rounded">View</a>
<a href="#{{ $row->id }}" class="px-2 py-1 bg-red-500 text-white rounded">Delete</a>

````

Then `$row->id` can be accessed from the row data

## Final component use for extra column

````
<x-simple-table 
    model="App\Models\Order"
    :columns="['id', 'name', 'email', 'date_registered']"
    actionColumn="Actions"
/>
````