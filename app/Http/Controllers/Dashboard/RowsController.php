<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BackEndController;
use App\Http\Requests\RowsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Row;

class RowsController extends BackEndController
{
    public function __construct(Row $model)
    {
        $columns =  ['name'];
        parent::__construct($model, $columns);
    } // End of Construct Method

    public function store(RowsRequest $request)
    {
        try {
            DB::BeginTransaction();
            $row  = Row::create($request->all());
            DB::Commit();
            if ($row) {
                $this->count += 1;
                return $this->successMessage('record_created', 'created');
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    }

    public function update(RowsRequest $request, Row $row)
    {
        try {
            DB::beginTransaction();
            $row->update($request->all());
            DB::commit();
            return $this->successMessage('record_updated', 'updated');
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Update Row

    public function destroy(Request $request)
    {
        try {
            $rows = Row::whereIn('id', (array)$request['id'])->get();
            if ($rows) {
                DB::beginTransaction();
                foreach ($rows as $row) {
                    if (($row->subjects->count() == 0) && ($row->rooms->count() == 0)) {
                        $row->delete();
                    } else {
                        return response()->json(['message' => __('alerts.cant_delete'), 'title' => __('alerts.warning'), 'type' => 'warning']);
                    }
                }
                DB::commit();
                $this->count -= count((array) $request['id']);
                return $this->successMessage('destroyed_successfully', 'destroy');
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    } // End of Delete Row [ Single & Multi ]
}
