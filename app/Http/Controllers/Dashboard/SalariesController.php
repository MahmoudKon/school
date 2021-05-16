<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BackEndController;
use App\Http\Requests\SalariesRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Absence;
use App\Models\Salary;
use App\Models\User;

class SalariesController extends BackEndController
{
    public function __construct(Salary $model)
    {
        $columns = ['salary', 'deduction', 'incentives', 'rate', 'note'];
        parent::__construct($model, $columns);
    } // End of Construct Method

    public function append()
    {
        return ['users' => User::withOutAuth()->get(),];
    } // End of Append Method


    /*
        absence => [1 , 0]

    */
    public function getAbsence(SalariesRequest $request)
    {
        $users = Absence::where('user_id', $request->user_id)->where('absence', 1)->get();

        $view = view('dashboard.salaries._form', compact('users'))->render();
        return response()->json(['view' => $view]);

        //$absences = DB::table('SELECT user_id, absence FROM `absences` WHERE user_id =  request()->user_id  And absence = 1');

        /*  $view = view('dashboard.salaries._form', ['absence' => $absences])->render();

            return response()->json(['status' => 200 , 'result' => $view]);
        */
    }

    public function store(SalariesRequest $request)
    {/*
        try{
            DB::BeginTransaction();
             $row = Salary::create($request->all());
            DB::Commit();
            $view = view('dashboard.salaries.row', compact('row'))->render();
            return response()->json(['view' => $view, 'message' => __('alerts.record_created'),
                                     'title' => __('alerts.created')]);
        }catch(\Exception $e){
         return response()->json($e->getMessage(), 404);
       } */
    }
}
