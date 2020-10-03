<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function postLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->to('index');
        } else {
            return redirect()->to('login');
        }
    }
}
