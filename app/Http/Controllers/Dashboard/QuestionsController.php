<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BackEndController;
use App\Http\Requests\QuestionsRequest;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionsController extends BackEndController
{
    public function __construct(Question $model)
    {
        $columns = ['id'];
        parent::__construct($model, $columns);
    } // End of Construct Method

    public function create()
    {
        try {
            return $exam = Exam::findOrFail(request()->id);
            return view('dashboard.exams.questions', compact('exam'));
        } catch (\Exception $e) {
            return $this->successMessage('destroyed_successfully', 'destroy');
        }
    } // End of Create New Row

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $exam = Exam::findOrFail($request->exam_id);
            foreach ($exam->questions as $question) {
                $question->delete();
            }
            foreach ($request->questions as $question) {
                if ($question['exam_id'] == null) {
                    $question['exam_id'] = $request->exam_id;
                }
                Question::create($question);
            }
            DB::commit();
            return $this->successMessage('record_created', 'created');
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Store Exam

    public function update(QuestionsRequest $request, Question $exam)
    {
        try {
            DB::beginTransaction();
            $exam->update($request->all());
            DB::commit();
            return $this->successMessage('updated_successfully', 'update');
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Update User

    public function destroy(Request $request)
    {
        try {
            $questions = Question::whereIn('id', (array)$request['id'])->get();
            if ($questions) {
                DB::beginTransaction();
                foreach ($questions as $question) {
                    $question->delete();
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
