<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Validator;

class VerifyController extends Controller
{
    public function index(){
    	return view('kader.verify');
    }

    public function upload(Request $request){
    	// Validasi
		$validator = Validator::make(request()->all(),[
			'pasphoto' => 'required|mimes:png,jpeg,jpg|max:2048',
			'ktm' => 'required|mimes:png,jpeg,jpg|max:2048'
		]);

		if ($validator->fails()) {
			return back()->with('Maaf, Semua Data Harus Diisi');
		} else {  
			// Pindah Request Pasfoto
			$photo = $request->file('pasphoto');
			$pasphoto = Auth::user()->nim . '.' . $photo->getClientOriginalExtension();
			$photo->move(storage_path('app/public/pasphoto'), $pasphoto);

			// Pindah Request KTM
			$ktm = $request->file('ktm');
			$fotoktm = Auth::user()->nim . '.' . $ktm->getClientOriginalExtension();
			$ktm->move(storage_path('app/public/ktm'), $fotoktm);

			$asu = User::where('email', Auth::user()->email)->update(
				[
					'pasphoto' => $pasphoto,
					'ktm' =>  $fotoktm,
					'verifikasi' => 'Perlu Diverifikasi'
				]);
			return redirect('/profile')->with('info', 'Data Akan Divalidasi Secepatnya, Harap Bersabar!');
		}
    }
}
