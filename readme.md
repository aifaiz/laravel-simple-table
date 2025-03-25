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