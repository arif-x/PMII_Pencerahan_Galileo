<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ApiToken;

class KaderController extends Controller
{
    public function index(Request $request){
    	$data = [];
    	$apiToken = ApiToken::where('functions', 'kader')->where('api_token', $request->api_token)->first();
    	if(!empty($apiToken)){
    		$kader = User::where('email', '!=', 'admin@pmiigalileo.or.id')->select('name', 'email', 'nim', 'angkatan', 'status_kaderisasi', 'jenis_kelamin', 'tanggal_lahir', 'jurusan', 'mhs_aktif', 'alamat_sekarang', 'alamat_di_malang', 'alamat_asli', 'nama_ayah', 'nama_ibu', 'no_hp', 'minat', 'bakat', 'target_ke_depan', 'alasan', 'photo', 'pasphoto', 'ktm')->get();
    		$data ['kader'] = $kader;
    		return response()->json(['status' => '200', 'data' => $data]);
    	} else {
    		return response()->json(['status' => 'Error 500']); 
    	}
    }
}
