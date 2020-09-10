<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request){
        if(auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])){
            return redirect()->to('index');
        }
        else{
            return redirect()->to('login');
        }
    }
}
