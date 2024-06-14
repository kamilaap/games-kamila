<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WebTrickController extends Controller
{
    public function index()
    {
    	// mengambil data dari table
    	$trick = DB::table('trick')->get();

    	// mengirim data ke view
    	return view('WebTrick',['trick' => $trick]);

    }
}
