<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PesertaEvent;
use App\User;
use Auth;

class JoinedEvent extends Controller{
    
    public function index(){
    	$profile = User::where('email', Auth::user()->email)->get();
    	$joins = PesertaEvent::join('events', 'events.id', '=', 'peserta_event.event_id')
    	->select('peserta_event.*', 'events.nama_event', 'events.tgl_mulai_regist', 'events.tgl_akhir_regist', 'events.tgl_mulai', 'events.tgl_akhir')
    	->where('user_id', Auth::user()->id)
    	->get();

    	return view('kader.events', ['joins' => $joins, 'profiles'=>$profile]);
    }
}
