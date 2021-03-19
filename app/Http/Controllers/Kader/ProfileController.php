<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;

class ProfileController extends Controller
{
    public function index(){
    	$profile = User::where('email', Auth::user()->email)->get();
		return view('kader.profile',['profiles'=>$profile]);
    }

    public function store(Request $request){
    	$validator = Validator::make(request()->all(),[
			'tanggal_lahir' => 'required',
			'jurusan' => 'required',
			'alamat_di_malang' => 'required',
			'alamat_asli' => 'required',
			'nama_ayah' => 'required',
			'nama_ibu' => 'required',
			'no_hp' => 'required',
			'minat' => 'required',
			'bakat' => 'required',
			'alasan' => 'required',
			'target_ke_depan' => 'required'
		]);

		if ($validator->fails()) {
			return back()->with('Maaf, Semua Data Harus Diisi');
		} else {
			User::where('email', Auth::user()->email)->update([
				'tanggal_lahir' => $request->tanggal_lahir,
				'jurusan' => $request->jurusan,
				'alamat_di_malang' => $request->alamat_di_malang,
				'alamat_asli' => $request->alamat_asli,
				'nama_ayah' => $request->nama_ayah,
				'nama_ibu' => $request->nama_ibu,
				'no_hp' => $request->no_hp,
				'minat' => $request->minat,
				'bakat' => $request->bakat,
				'alasan' => $request->alasan,
				'target_ke_depan' => $request->target_ke_depan
			]);
			return back()->with('info', 'Sukses, Profil Telah Diedit');
		}
    }

    public function photoStore(Request $request){
		$request->validate([
			'image' => 'required|mimes:png,jpeg,jpg|max:2048'
		]);
		$photo = $request->file('image');
		$new_name = Auth::user()->nim . '.' . $photo->getClientOriginalExtension();
		$photo->move(storage_path('app/public/foto'), $new_name);
		$asu = User::where('email', Auth::user()->email)->update(
			[
				'photo' => $new_name,
			]);
		return back()->with('info', 'Sukses, Foto Berhasil Diubah');
	}
}
