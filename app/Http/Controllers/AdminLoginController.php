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
    public function loginUser(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins',
            'password' => 'required|min:5|max:12',
        ]);
        $admin = Admin::where('username','=',$request->username)->first();
        if($admin){
            if(check($request->password, $admin->password)){
                
                return redirect('AdminDashboard');
            }
            else{
                return back()->with('fail','Password do not match!');
            }

        }else {
            return back()->with('fail','Admin is not registered');
        }
    }
}
