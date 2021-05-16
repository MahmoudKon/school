<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BackEndController;
use App\Http\Requests\ExamsRequest;
use App\Models\Exam;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamsController extends BackEndController
{
    public function __construct(Exam $model)
    {
        $columns = ['id'];
        parent::__construct($model, $columns);
    } // End of Construct Method

    protected function append()
    {
        return [
            'subjects' => Subject::whereDoesntHave('exams')->where('user_id', auth()->user()->id)->get(),
            'teachers' => User::whereRoleIs('teacher')->get(),
        ];
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $exam = Exam::create($request->all());
            DB::commit();
            if ($exam) {
                $this->count += 1;
                $redirect = view('dashboard.exams._questions', compact('exam'))->render();
                // return $this->successMessage('record_created', 'created');
                return response()->json(['redirect' => $redirect, 'message' => __('alerts.destroyed_successfully'), 'title' => __('alerts.destroy')]);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Store Exam

    public function questions(Request $request, Exam $exam)
    {
        try {
            dd($request->all());
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Store Exam

    public function update(ExamsRequest $request, Exam $exam)
    {
        try {
            DB::beginTransaction();
            $exam->update($request->all());
            DB::commit();
            $redirect = view('dashboard.exams._questions', compact('exam'))->render();
            return response()->json(['redirect' => $redirect, 'message' => __('alerts.record_updated'), 'title' => __('alerts.updated')]);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Update User

    public function destroy(Request $request)
    {
        try {
            $exams = Exam::whereIn('id', (array)$request['id'])->get();
            if ($exams) {
                DB::beginTransaction();
                foreach ($exams as $exam) {
                    $exam->delete();
                }
                DB::commit();
                $this->count -= count((array) $request['id']);
                return $this->successMessage('destroyed_successfully', 'destroy');
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    } // End of Soft Delete Users [ Single & Multi ]
}
