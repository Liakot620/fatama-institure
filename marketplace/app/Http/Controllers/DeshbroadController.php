<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class DeshbroadController extends Controller
{
    public function index(){
        $user = User::all();
          return view("admin.deshbroad",$user);
    }
}
