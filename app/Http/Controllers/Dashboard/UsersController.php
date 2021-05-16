<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use App\Http\Controllers\BackEndController;
use App\Http\Requests\ImportRequest;
use App\Http\Requests\UsersRequest;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends BackEndController
{
    public function __construct(User $model)
    {
        $columns = ['id', 'username', 'email'];
        parent::__construct($model, $columns);
    } // End of Construct Method

    public function store(UsersRequest $request)
    {
        try {
            DB::beginTransaction();
            $row = User::create($request->except(['role']))->attachRole($request['role']);
            DB::commit();
            if ($row) {
                $this->count += 1;
                return $this->successMessage('record_created', 'created');
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Store User

    public function update(UsersRequest $request, User $user)
    {
        try {
            DB::beginTransaction();
            $oldImage = $user->image;
            $user->update($request->all());
            $user->syncRoles([$request['role']]);
            DB::commit();
            if ($request->has('image'))
                removeImage($oldImage, 'users');
            return $this->successMessage('record_updated', 'updated');
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Update User

    public function destroy(Request $request)
    {
        try {
            $users = User::whereIn('id', (array)$request['id'])->get();
            if ($users) {
                DB::beginTransaction();
                foreach ($users as $user) {
                    $user->delete();
                }
                DB::commit();
                $this->count -= count((array) $request['id']);
                return $this->successMessage('destroyed_successfully', 'destroy');
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    } // End of Soft Delete Users [ Single & Multi ]

    public function export($file)
    {
        try {
            if ($file === 'excel')
                return Excel::download(new UsersExport, 'users.xlsx');

            if ($file === 'csv')
                return Excel::download(new UsersExport, 'users.csv');
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Export Files

    public function import(ImportRequest $request)
    {
        try {
            Excel::queueImport(new UsersImport, $request->file('file'));
            return response()->json(['message' => __('alerts.importing_message'), 'title' => __('alerts.importing')]);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Import Files

    public function card(User $user)
    {
        try {
            return response()->json(view('dashboard.users._card', compact('user'))->render());
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of View User Card

} // END OF USERS CONTROLLER
