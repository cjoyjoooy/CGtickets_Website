<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Admin;
use Hash;
use Session;

class adminLoginController extends Controller
{
    public function login()
    {
        return view ("admin.admin_login");
    }
    public function loginuser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $admin = Admin::where('username','=',$request->username)->first();
        if($admin){
            if ($request->password == $admin->password) {
                $request->session()->put('id', $admin->id);
                return redirect(route('admindashboard'));
            } else {
                return back()->with('fail', 'Password do not match!');
            }

        }else {
            return back()->with('fail','Admin is not registered');
        }
    }
}
