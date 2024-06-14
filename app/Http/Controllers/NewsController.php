<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // Retrieve data from the table
        $news = DB::table('news')->get();

        // Send data to the view
        return view('News', ['news' => $news]);
    }

    public function tambah(Request $request)
    {
    	DB::table('news')->insert([
			'kd_news' => $request->kd_news,
			'judul_news' => $request->judul_news,
            'gambar_news' => $request->gambar_news,
            'link_news' => $request->link_news,

		]);
		// alihkan halaman ke halaman news
		return redirect('/news');

    }


    public function hapus(Request $request)
    {
		$kd_news=$request->kd_news;
		DB::table('news')->where('kd_news',$kd_news)->delete();

		// alihkan halaman ke halaman news
		return redirect('/news');

    }
    public function edit(Request $request)
    {
    	DB::table('news')->where('kd_news',$request->kd_news)->update([

			'judul_news' => $request->judul_news,
            'gambar_news' => $request->gambar_news,
            'link_news' => $request->link_news,

        ]);
		// alihkan halaman ke halaman news
		return redirect('/news');

    }
}
