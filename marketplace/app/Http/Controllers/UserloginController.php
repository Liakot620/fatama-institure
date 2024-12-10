<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserloginController extends Controller
{
    public function index(){
        return view("login.userlogin");
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $user = User::where("email", '=',$email )->first();
        if ($user && Hash::check($password, $user->password)) {
            // Log in the user
            return redirect('/deshbroad');

        } else {
            return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
        }
    }
}
