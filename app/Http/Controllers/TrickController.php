<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TrickController extends Controller
{
    public function index()
    {
        // Retrieve data from the table
        $trick = DB::table('trick')->get();

        // Send data to the view
        return view('Trick', ['trick' => $trick]);
    }

    public function tambah(Request $request)
    {
    	DB::table('trick')->insert([
			'kd_trick' => $request->kd_trick,
			'judul_trick' => $request->judul_trick,
            'gambar_trick' => $request->gambar_trick,
            'link_trick' => $request->link_trick,

		]);
		// alihkan halaman ke halaman trick
		return redirect('/trick');

    }


    public function hapus(Request $request)
    {
		$kd_trick=$request->kd_trick;
		DB::table('trick')->where('kd_trick',$kd_trick)->delete();

		// alihkan halaman ke halaman trick
		return redirect('/trick');

    }
    public function edit(Request $request)
    {
    	DB::table('trick')->where('kd_trick',$request->kd_trick)->update([

			'judul_trick' => $request->judul_trick,
            'gambar_trick' => $request->gambar_trick,
            'link_trick' => $request->link_trick,

        ]);
		// alihkan halaman ke halaman trick
		return redirect('/trick');

    }
}
