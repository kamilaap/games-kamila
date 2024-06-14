<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WebNewsController extends Controller
{
    public function index()
    {
    	// mengambil data dari table
    	$news = DB::table('news')->get();

    	// mengirim data ke view
    	return view('WebNews',['news' => $news]);

    }

}
