<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogsController extends Controller
{
    private $count;

    public function __construct()
    {
        $this->count = Log::count();
    }

    private function rows($request)
    {
        $paginate = (int) $request['record'] ?? PAGINATE_NUMBERT;
        $sort     = $request['sort'] ?? 'id';
        $order    = $request['order'] ?? 'desc';

        $rows = Log::search($request)->orderBy($sort, $order)->paginate($paginate);
        $view = view('dashboard.includes.table._rows', compact('rows'))->render();
        return response()->json(['view' => $view, 'count' => $this->count]);
    } // End of Show Rows

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->rows($request);
        } // end of if
        $columns = ['url', 'message', 'model', 'controller',];
        return view('dashboard.logs.index', compact('columns'));
    } // End of Index Show Row

    public function destroy(Request $request)
    {
        try {
            $logs = Log::whereIn('id', (array)$request['id'])->get();
            if ($logs) {
                DB::beginTransaction();
                foreach ($logs as $log) {
                    $log->delete();
                }
                DB::commit();
                $this->count -= count((array) $request['id']);
                return $this->successMessage('destroyed_successfully', 'destroy');
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    } // End of Soft Delete Logs [ Single & Multi ]
}
