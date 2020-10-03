<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Role;
use App\Model\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $role;
    protected $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->role->all();
        $permissions = $this->permission->all();
        return view('role.index', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function table()
    {
        $roles = $this->role->getAllRole();
        return view('role.table', compact('roles'));
    }

    public function search(Request $request)
    {
        $name = $request->name;
        $roles = $this->role->searchRole($name);
        return view('role.table', compact('roles'));
    }

    public function getBy($id)
    {
        $role = $this->role->findOrFail($id)->load('permissions');
        $permissions = $role->permissions->pluck('id')->toArray();
        return response()->json([
            'message' => 'lay thanh cong',
            'role' => $role,
            'permissions' => $permissions,
            'status' => '200'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = $this->role->create($request->only('name', 'display_name'));
        $role->permissions()->attach($request->permissions);
        return response()->json([
            'message' => 'them thanh cong',
            'data' => $role,
            'code' => '201'
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = $this->role->findOrFail($id);
        $role->updateRole($request->all());
        $permission_id = $request->permissions;
        $role->permissions()->sync($permission_id);
        return response()->json([
            'message' => 'cap nhat thanh cong',
            'role' => $role,
            'code' => '204'
        ], 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = $this->role->destroy($id);
        return response()->json([
            'message' => 'Delete susscess',
            'status' => '200'
        ], 200);
    }
}
