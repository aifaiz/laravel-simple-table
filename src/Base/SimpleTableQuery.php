<?php 
namespace Aifaiz\SimpleTable\Base;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class SimpleTableQuery
{
    protected $query;

    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    /**
     * Allow users to apply custom filters
     */
    public function applyFilters(Request $request): Builder
    {
        return $this->query;
    }

    /**
     * Get the final query result
     */
    public function getQuery(): Builder
    {
        return $this->applyFilters(request());
    }
}
