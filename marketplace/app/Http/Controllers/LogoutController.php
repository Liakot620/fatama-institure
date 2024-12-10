<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class LogoutController extends Controller
{
    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
   }
}
