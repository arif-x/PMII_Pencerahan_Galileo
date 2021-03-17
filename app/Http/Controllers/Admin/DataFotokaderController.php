<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;

class DataFotokaderController extends Controller
{
    public function pasPhoto($nim){
    	$data = User::where('nim', $nim)->get();
    	return view('admin.fotoKader.pasPhoto', ['data' => $data]);
    }

    public function ktm($nim){
    	$data = User::where('nim', $nim)->get();
    	return view('admin.fotoKader.ktm', ['data' => $data]);
    }
}
