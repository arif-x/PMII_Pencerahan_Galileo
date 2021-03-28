<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;

class DataBiodataController extends Controller
{
	public function index(){
		return view('kader.isiBiodata');
	}

    public function store(Request $request){
    	$validator = Validator::make(request()->all(),[
			'nim' =>'required',
			'tanggal_lahir' => 'required',
			'jenis_kelamin' => 'required',
			'jurusan' => 'required',
			'mhs_aktif' => 'required',
			'alamat_sekarang' => 'required_without:alamat_di_malang',
			'alamat_di_malang' => 'required_without:alamat_asli',
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
			return redirect('/isi-biodata');
		} else {
			User::where('email', Auth::user()->email)->update([
				'nim' => $request->nim,
				'tanggal_lahir' => $request->tanggal_lahir,
				'jenis_kelamin' => $request->jenis_kelamin,
				'jurusan' => $request->jurusan,
				'mhs_aktif' => $request->mhs_aktif,
				'alamat_sekarang' => $request->alamat_sekarang,
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
			return redirect('/')->with('info', 'Sukses');
		}
    }
}
