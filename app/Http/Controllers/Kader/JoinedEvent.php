<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PesertaEventPengkaderan;
use App\User;
use Auth;

class JoinedEvent extends Controller{
    
    public function index(){
    	$profile = User::where('email', Auth::user()->email)->get();
    	$joins = PesertaEventPengkaderan::join('event_pengkaderans', 'event_pengkaderans.id', '=', 'peserta_event_pengkaderan.event_id')
    	->select('peserta_event_pengkaderan.*', 'event_pengkaderans.nama_event', 'event_pengkaderans.tgl_mulai_regist', 'event_pengkaderans.tgl_akhir_regist', 'event_pengkaderans.tgl_mulai', 'event_pengkaderans.tgl_akhir')
    	->where('user_id', Auth::user()->id)
    	->get();

    	return view('kader.events', ['joins' => $joins, 'profiles'=>$profile]);
    }
}
