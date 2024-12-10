<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Market;
use Illuminate\Support\Facades\DB;

class MarketController extends Controller
{
    public function index(){
        $marker = Market::all();
        return view("admin.merket.index",["markets"=>$marker]);
    }
}
