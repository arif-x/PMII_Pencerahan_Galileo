<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EventPengkaderan;
use App\PesertaEventPengkaderan;
use Carbon\Carbon;

class EventPengkaderanController extends Controller
{
    public function index(){
    	$event = EventPengkaderan::orderBy('id', 'desc')->paginate(10);
    	return view('eventPengkaderan.index', ['events' => $event]);
    }

    public function single($id){
        $event = EventPengkaderan::where('id', $id)->get();
        return response()->json($event);
    }

    public function dibuka(){
    	$now = Carbon::today()->toDateString();
    	$event = EventPengkaderan::where('tgl_akhir_regist', '>', $now)->orderBy('id', 'desc')->paginate(10);
    	return view('eventPengkaderan.dibuka', ['events' => $event]);
    }

    public function ditutup(){
    	$now = Carbon::today()->toDateString();
    	$event = EventPengkaderan::where('tgl_akhir_regist', '<', $now)->orderBy('id', 'desc')->paginate(10);
    	return view('eventPengkaderan.ditutup', ['events' => $event]);
    }

    public function join(Request $request){
        $check = PesertaEventPengkaderan::where('event_id', $request->event_id)->where('user_id', $request->user_id)->first();

        $eventNames = EventPengkaderan::where('id', $request->event_id)->pluck('nama_event');

        $eventName = str_replace('"]', '', $eventNames);
        $eventName = str_replace('["', '', $eventName);


        if (empty($check)){
            PesertaEvent::create([
                'event_id' => $request->event_id,
                'user_id' => $request->user_id,
            ]);
            return back()->with('success', 'Anda Berhasil Mendaftar Event ' . $eventName);
        } else {
            return back()->with('success', 'Anda Sudah Mendaftar Event ' . $eventName);
        }
    }
}
