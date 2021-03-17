<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class FriendController extends Controller
{
	public function index(){
		$user = User::where('email', '!=', Auth::user()->email)->paginate(5);
		return view('kader.friends', ['all' => $user]);
	}

	public function single($nim){
		$user = User::where('nim', $nim)->get();
		return view('kader.friendSingle', ['all' => $user]);
	}

	public function search(Request $request){
		$nama = $request->nama;
		$angkatan_mapaba = $request->angkatan_mapaba;
		$user = User::where('name', 'Like', "%{$nama}%")
		->orWhere('angkatan', $angkatan_mapaba)
		->paginate(10);
		$error = "Not Found";
		if ($user->isEmpty()){			
			return view('kader.friendsError', compact('error'));
		}		
		return view('kader.friends', ['all' => $user]);
	}
	
	public function angkatan($angkatan){
	    $user = User::where('angkatan', $angkatan)
		->paginate(10);
		$error = "Not Found";
		if ($user->isEmpty()){			
			return view('kader.friendsError', compact('error'));
		}		
		return view('kader.friends', ['all' => $user]);
	}
}
