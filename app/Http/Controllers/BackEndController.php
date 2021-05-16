<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BackEndController extends Controller
{
    protected $model;   // Have The Model Name
    protected $count;   // Have The Count
    protected $columns; // Have The Columns Name

    public function __construct(Model $model, array $columns)
    {
        $this->model   = $model;
        $this->count   = $model->count();
        $this->columns = $columns;
    }

    private function rows($request)
    {
        try {
            $paginate = (int) $request['record'] ?? PAGINATE_NUMBERT;
            $sort     = $request['sort'] ?? 'id';
            $order    = $request['order'] ?? 'desc';
            $rows = $this->model::search($request)->orderBy($sort, $order)->paginate($paginate);

            $view = view('dashboard.includes.table._rows', compact('rows'))->render();
            return response()->json(['view' => $view, 'count' => $this->count]);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Show Rows

    public function index(Request $request)
    {
        try {
            if ($request->ajax())
                return $this->rows($request);

            $count   = $this->model->count();
            $columns = $this->columns;
            return view($this->getView('index'), compact('columns'))->with($this->append());
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Index Show Row

    public function create()
    {
        try {
            return response()->json(view('dashboard.includes.form._create')->with($this->append())->render());
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Create New Row

    public function edit($id)
    {
        try {
            return response()->json(view('dashboard.includes.form._edit', ['row' => $this->model->findOrFail($id)])->with($this->append())->render());
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Edit Row

    public function show($id)
    {
        try {
            $row = $this->model->findOrFail($id);
            return $row;
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Index Show Row

    public function getImport()
    {
        return view('dashboard.includes.form._import');
    } // End of Load The Form

    protected function getView($page)
    {
        return 'dashboard.' . $this->getModel() . '.' . $page;
    } // To Return The View Of Model [ User => plural() To Make It Users, class_basename() To Get Te Class Name  ]

    protected function getModel()
    {
        return Str::plural(strtolower(class_basename($this->model)));
    } // To Return The Plural Class Name

    protected function append()
    {
        return [];
    }

    protected function successMessage(string $message, string $title)
    {
        return response()->json(['message' => __('alerts.' . $message), 'title' => __('alerts.' . $title),]);
    } // Return The Success Message
}
