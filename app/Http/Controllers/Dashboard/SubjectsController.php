<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SubjectsRequest;
use App\Http\Controllers\BackEndController;
use App\Models\Row;

class SubjectsController extends BackEndController
{
    public function __construct(Subject $model)
    {
        $columns = ['id', 'subject'];
        parent::__construct($model, $columns);
    } // End of Construct Method

    public function append()
    {
        return ['teachers' => User::whereRoleIs('teacher')->get(), 'classes' => Row::get()];
    } // End of append Method

    public function store(SubjectsRequest $request)
    {
        DB::beginTransaction();
        if ($this->is_exists($request['subject'], $request['row_id'], $request['semester']) > 0)
            return  response()->json(['errors' => ['subject' => [__('subjects.exists')]]], 422);

        $row = Subject::create($request->all());
        DB::commit();
        if ($row) {
            $this->count += 1;
            return $this->successMessage('record_created', 'created');
        }
    } // End of Store Subject

    public function update(SubjectsRequest $request, Subject $subject)
    {
        try {
            DB::beginTransaction();
            if ($this->is_exists($request['subject'], $request['row_id'], $request['semester'], $subject->id) > 0)
                return  response()->json(['errors' => ['subject' => [__('subjects.exists')]]], 422);
            $subject->update($request->all());
            DB::commit();
            return $this->successMessage('record_updated', 'updated');
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Update Subject

    public function destroy(Request $request)
    {
        try {
            $subjects = Subject::whereIn('id', (array)$request['id'])->get();
            if ($subjects) {
                DB::beginTransaction();
                foreach ($subjects as $subject) {
                    $subject->delete();
                }
                DB::commit();
                $this->count -= count((array) $request['id']);
                return $this->successMessage('destroyed_successfully', 'destroy');
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    } // End of Soft Delete Subjects [ Single & Multi ]

    protected function is_exists($subject, $row_id, $semester, $id = null)
    {
        // dd(Subject::where('subject', $subject)->where('row_id', $row_id)->where('semester', $semester)->where('id', '<>', $id)->count());
        return Subject::where('subject', $subject)->where('row_id', $row_id)->where('semester', $semester)->where('id', '<>', $id)->count();
    } // Return The Count Of Roles They Have This [ $name ]
}
