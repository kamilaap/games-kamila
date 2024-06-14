<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WebProfileGameController extends Controller
{
    public function index()
    {
    	// mengambil data dari table
    	$profilegame = DB::table('profilegame')->get();

    	// mengirim data ke view
    	return view('WebProfileGame',['profilegame' => $profilegame]);

    }
}
