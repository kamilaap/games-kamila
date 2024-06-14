<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index()
    {
        // Retrieve data from the table
        $videos = DB::table('videos')->get();

        // Send data to the view
        return view('Videos', ['videos' => $videos]);
    }

    public function tambah(Request $request)
    {
    	DB::table('videos')->insert([
			'kd_videos' => $request->kd_videos,
			'judul_videos' => $request->judul_videos,
            'gambar_videos' => $request->gambar_videos,
            'link_videos' => $request->link_videos,

		]);
		// alihkan halaman ke halaman videos
		return redirect('/videos');

    }


    public function hapus(Request $request)
    {
		$kd_videos=$request->kd_videos;
		DB::table('videos')->where('kd_videos',$kd_videos)->delete();

		// alihkan halaman ke halaman videos
		return redirect('/videos');

    }
    public function edit(Request $request)
    {
    	DB::table('videos')->where('kd_videos',$request->kd_videos)->update([

			'judul_videos' => $request->judul_videos,
            'gambar_videos' => $request->gambar_videos,
            'link_videos' => $request->link_videos,

        ]);
		// alihkan halaman ke halaman videos
		return redirect('/videos');

    }
}
