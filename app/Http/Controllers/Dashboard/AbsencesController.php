<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BackEndController;
use App\Http\Requests\AbsencesRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Absence;
use App\Models\User;
use Illuminate\Http\Request;

class AbsencesController extends BackEndController
{
    public function __construct(Absence $model)
    {
        $columns =  ['user_id', 'code_id', 'month', 'day', 'Tpresence', 'Tback', 'absence', 'note'];
        parent::__construct($model, $columns);
    } // End of Construct Method

    public function append()
    {
        return ['users' => User::where('id', '<>', auth()->user()->id)->get()];
    } // End of append Method

    public function store(AbsencesRequest $request)
    {
        try {
            DB::BeginTransaction();
            $row = Absence::create($request->all());
            DB::Commit();
            if ($row) {
                $this->count += 1;
                return $this->successMessage('record_created', 'created');
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $absences = Absence::whereIn('id', (array)$request['id'])->get();
            if ($absences) {
                DB::beginTransaction();
                foreach ($absences as $absence) {
                    $absence->delete();
                }
                DB::commit();
                $this->count -= count((array) $request['id']);
                return $this->successMessage('destroyed_successfully', 'destroy');
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    } // End of Delete Ro [ Single & Multi ]
}
