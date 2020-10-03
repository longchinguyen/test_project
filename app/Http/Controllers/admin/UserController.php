<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\DB;
use App\Model\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user;
    protected $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $users = $this->user->all();
        $roles = $this->role->all();
        return view("user.user", compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $this->user->create($request->all());
        $user->roles()->attach($request->roles);
        return response()->json([
            'message' => 'create success',
            'data' => $user,
            'code' => 201
        ], 201);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getData($id)
    {
        $user = $this->user->findOrFail($id)->load('roles');
        $roles = $user->roles->pluck('id')->toArray();
        return response()->json([
            'message' => 'lay thanh cong',
            'user' => $user,
            'roles' => $roles,
            'status' => '200'
        ], 200);
    }

    public function table()
    {
        $users = $this->user->getAllUser();
        return view('user.table', compact('users'))->render();
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
        $user = $this->user->getUser($id);
        $user->updateUser($request->all());
        $role_id = $request->roles;
        $user->roles()->sync($role_id);
        return response()->json([
            'message' => 'them thanh cong',
            'data' => $user,
            'code' => '201'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->destroy($id);
        return response()->json([
            'message' => 'xoa thanh cong',
            'code' => '204'
        ], 204);
    }

    public function search(Request $request)
    {
        $name = $request->get('name');
        $users = $this->user->searchUser($name);
        return view('user.table', compact('users'));
    }

    public function error()
    {
        return view('user.error');
    }
}
