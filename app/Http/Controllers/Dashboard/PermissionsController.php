<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BackEndController;
use App\Http\Requests\PermissionsRequest;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PermissionsController extends BackEndController
{
    public function __construct(Permission $model)
    {
        $columns = ['name', 'description'];
        parent::__construct($model, $columns);
    } // End of Construct Method

    // public function store(PermissionsRequest $request)
    public function store(PermissionsRequest $request)
    {
        try {
            DB::beginTransaction();
            if ($this->is_exists($request['action'] . '_' . Str::plural(strtolower($request['name']))) > 0)
                return response()->json(['errors' => ['permission' => [__('permissions.exists', ['permission' => $request['action'] . '_' . Str::plural(strtolower($request['name']))])]]], 422);

            $row = Permission::create([
                'name'         => $request['action'] . '_' . Str::plural(strtolower($request['name'])),
                'display_name' => ucfirst($request['action']) . ' ' . Str::plural(ucfirst($request['name'])),
                'description'  => $request['description'],
            ]);
            DB::commit();
            if ($row) {
                $this->count += 1;
                return $this->successMessage('record_created', 'created');
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Store Row

    public function update(PermissionsRequest $request, Permission $permission)
    {
        try {
            DB::beginTransaction();
            if ($this->is_exists($request['action'] . '_' . Str::plural(strtolower($request['name'])), $request['id']) > 0)
                return response()->json(['errors' => ['permission' => [__('permissions.exists', ['permission' => $request['action'] . '_' . Str::plural(strtolower($request['name']))])]]], 422);

            $permission->update([
                'name'         => $request['action'] . '_' . Str::plural(strtolower($request['name'])),
                'display_name' => ucfirst($request['action']) . ' ' . Str::plural(ucfirst($request['name'])),
                'description'  => $request['description'],
            ]);
            DB::commit();
            return $this->successMessage('updated_successfully', 'update');
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // End of Update Row

    public function destroy(Request $request)
    {
        try {
            $permissions = Permission::whereIn('id', (array)$request['id'])->get();
            if ($permissions) {
                DB::beginTransaction();
                foreach ($permissions as $permission) {
                    $permission->delete();
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
        return Permission::where('name', '=', str_replace(' ', '_', strtolower($name)))
            ->where('id', '<>', $id)->get()->count();
    } // Return The Count Of Permissions They Have This [ $name ]
}
