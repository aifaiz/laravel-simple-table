<?php 
namespace Aifaiz\SimpleTable\View\Components;

use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Aifaiz\SimpleTable\Base\SimpleTableQuery;

class SimpleTable extends Component
{
    public $model;
    public $columns;
    public $data;
    public $queryClass;

    public function __construct(string $model, array $columns, string $queryClass = null, Request $request)
    {
        if (!class_exists($model) || !is_subclass_of($model, Model::class)) {
            throw new \Exception("Invalid model: $model");
        }

        $query = $model::query();

        // Sorting
        if ($request->has('sort') && in_array($request->sort, $columns)) {
            $query->orderBy($request->sort, $request->order == 'desc' ? 'desc' : 'asc');
        }

        // Searching
        if ($request->has('search')) {
            foreach ($request->search as $column => $value) {
                if (!empty($value) && in_array($column, $columns)) {
                    $query->where($column, 'like', "%$value%");
                }
            }
        }

        // Apply custom query class if provided
        if ($queryClass && class_exists($queryClass) && is_subclass_of($queryClass, SimpleTableQuery::class)) {
            $query = (new $queryClass($query))->getQuery();
        }

        $this->data = $query->paginate(50);
        $this->columns = $columns;
    }

    public function render()
    {
        return view('simple-table::simple-table');
    }
}
