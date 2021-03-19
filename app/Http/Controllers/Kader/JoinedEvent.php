<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AbsensiEventKaderisasi;
use App\User;
use Auth;

class JoinedEvent extends Controller{
    
    public function index(){
    	$profile = User::where('email', Auth::user()->email)->get();
    	$joinsK = AbsensiEventKaderisasi::join('event_pengkaderans', 'event_pengkaderans.id', '=', 'absensi_event_kaderisasi.id_event')
    	->select('absensi_event_kaderisasi.*', 'event_pengkaderans.nama_event', 'event_pengkaderans.tgl_mulai_regist', 'event_pengkaderans.tgl_akhir_regist', 'event_pengkaderans.tgl_mulai', 'event_pengkaderans.tgl_akhir')
    	->where('id_user', Auth::user()->id)
    	->get();

    	$joinsU = AbsensiEventKaderisasi::join('events', 'events.id', '=', 'absensi_event_kaderisasi.id_event')
    	->select('absensi_event_kaderisasi.*', 'events.nama_event', 'events.tgl_mulai_regist', 'events.tgl_akhir_regist', 'events.tgl_mulai', 'events.tgl_akhir')
    	->where('id_user', Auth::user()->id)
    	->get();

    	return view('kader.events', ['joinsK' => $joinsK, 'joinsU' => $joinsU, 'profiles'=>$profile]);
    }
}
