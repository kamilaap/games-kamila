<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProfileGameController extends Controller
{
    public function index()
    {
        // Retrieve data from the table
        $profilegame = DB::table('profilegame')->get();

        // Send data to the view
        return view('ProfileGame', ['profilegame' => $profilegame]);
    }

    public function tambah(Request $request)
    {
    	DB::table('profilegame')->insert([
			'kd_profile' => $request->kd_profile,
			'judul_profile' => $request->judul_profile,
            'gambar_profile' => $request->gambar_profile,
            'link_profile' => $request->link_profile,

		]);
		// alihkan halaman ke halaman profile
		return redirect('/profilegame');

    }


    public function hapus(Request $request)
    {
		$kd_profile=$request->kd_profile;
		DB::table('profilegame')->where('kd_profile',$kd_profile)->delete();

		// alihkan halaman ke halaman profile
		return redirect('/profilegame');

    }
    public function edit(Request $request)
    {
    	DB::table('profilegame')->where('kd_profile',$request->kd_profile)->update([

			'judul_profile' => $request->judul_profile,
            'gambar_profile' => $request->gambar_profile,
            'link_profile' => $request->link_profile,

        ]);
		// alihkan halaman ke halaman profile
		return redirect('/profilegame');

    }
}
