<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BackEndController;
use App\Http\Requests\RolesRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends BackEndController
{
    public function __construct(Role $model)
    {
        $columns = ['name', 'description'];
        parent::__construct($model, $columns);
    } // End of Construct Method

    public function store(RolesRequest $request)
    {
        try {
            DB::beginTransaction();
            if ($this->is_exists($request['name']) > 0)
                return  response()->json(['errors' => ['name' => [__('roles.exists', ['role' => str_replace(' ', '_', strtolower($request['name']))])]]], 422);

            $row = Role::create($request->except('permissions'));
            if ($request['permissions'])
                $row->attachPermissions($request['permissions']['name']);
            DB::commit();
            if ($row) {
                $this->count += 1;
                return $this->successMessage('record_created', 'created');
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Store Row

    public function update(RolesRequest $request, Role $role)
    {
        try {
            DB::beginTransaction();
            if ($this->is_exists($request['name'], $request['id']) > 0)
                return  response()->json(['errors' => ['name' => [__('roles.exists', ['role' => str_replace(' ', '_', strtolower($request['name']))])]]], 422);

            $role->update($request->except('permissions'));

            if ($request['permissions'])
                $role->syncPermissions($request['permissions']['name']);
            else
                $role->detachPermissions();

            DB::commit();
            return $this->successMessage('record_updated', 'updated');
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Update Row

    public function destroy(Request $request)
    {
        try {
            $roles = Role::whereIn('id', (array)$request['id'])->get();
            if ($roles) {
                DB::beginTransaction();
                foreach ($roles as $role) {
                    $role->delete();
                }
                DB::commit();
                $this->count -= count((array) $request['id']);
                return $this->successMessage('destroyed_successfully', 'destroy');
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    } // End of Soft Delete Rows [ Single & Multi ]

    protected function is_exists($name, $id = null)
    {
        return Role::where('name', '=', str_replace(' ', '_', strtolower($name)))
            ->where('id', '<>', $id)->get()->count();
    } // Return The Count Of Roles They Have This [ $name ]
}
