<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;

class adminSignUpController extends Controller
{
    public function signup()
    {
        return view ("admin.adminSignUp");
    }

    public function signupUser(Request $request )
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:admins',
            'password' => 'required|min:5|max:12',
        ]);
        $admin=new Admin();
        $admin->name = $request -> name;
        $admin->username = $request -> username;
        $admin->password = $request -> password;
        
        if($admin){
            $admin->save();
            return redirect(route('login')) -> with('success', 'Added new admin successfully');
//return view("admin.admin_login");
        }else{
            return back()->with('fail', 'Error in Signing Up');
        }
    }
}
