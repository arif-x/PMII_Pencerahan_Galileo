<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Feedback;

class FeedbackController extends Controller
{
    public function send(Request $request){
    	Feedback::insert([
    		'nama' => $request->name,
    		'email' => $request->email,
    		'subjek' => $request->subject,
    		'pesan' => $request->message
    	]);

    	return response()->json(['data' => 'Pesan Berhasil Dikirim']);
    }
}
