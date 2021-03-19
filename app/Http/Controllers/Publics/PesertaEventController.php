<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\PesertaEvent;
use App\Event;
use App\AbsensiEvent;

class PesertaEventController extends Controller
{
    public function guest(Request $request){
    	$check = PesertaEvent::where('email', $request->email)->first();

    	$eventNames = Event::where('id', $request->event_id)->pluck('nama_event');

        $eventName = str_replace('"]', '', $eventNames);
        $eventName = str_replace('["', '', $eventName);

    	if(empty($check)){
    		
            PesertaEvent::insert([
    			'event_id' => $request->event_id,
    			'email' => $request->email,
    			'nama' => $request->nama,
    			'rayon' => $request->rayon,
    		]);

            AbsensiEvent::insert([
                'event_id' => $request->event_id,
                'email' => $request->email,
                'kehadiran' => 'Pending';
            ]);

    		return back()->with('success', 'Anda Berhasil Mendaftar Event ' . $eventName);
    	} else {
    		return back()->with('success', 'Anda Sudah Mendaftar Event ' . $eventName);
    	}
    }

    public function authed(Request $request){
    	$check = PesertaEvent::where('email', $request->email)->first();

    	$eventNames = Event::where('id', $request->event_id)->pluck('nama_event');

        $eventName = str_replace('"]', '', $eventNames);
        $eventName = str_replace('["', '', $eventName);
        
    	if(empty($check)){
    		PesertaEvent::insert([
    			'event_id' => $request->event_id,
    			'email' => Auth::user()->email,
    			'nama' => Auth::user()->name,
    			'rayon' => 'Rayon PMII Pencerahan Galileo',
    		]);

    		return back()->with('success', 'Anda Berhasil Mendaftar Event ' . $eventName);
    	} else {
    		return back()->with('success', 'Anda Sudah Mendaftar Event ' . $eventName);
    	}
    }
}
