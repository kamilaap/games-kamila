<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WebVideosController extends Controller
{
    public function index()
    {
    	// mengambil data dari table
    	$videos = DB::table('videos')->get();

    	// mengirim data ke view
    	return view('WebVideos', ['videos' => $videos]);

    }
}
