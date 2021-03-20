<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\AbsensiEvent;
use Carbon\Carbon;
use Auth;

class EventController extends Controller
{
    public function index(){        
    	$eventCheck = Event::first();

        if (empty($eventCheck)){
            $notFound = 'Tidak Ada Event';
            $event = Event::orderBy('id', 'desc')->paginate(10);
            return view('event.index', ['events' => $event, 'notFound' => $notFound]);
        } else {
            $notFound = '';
            $event = Event::orderBy('id', 'desc')->paginate(10);
            return view('event.index', ['events' => $event, 'notFound' => $notFound]);
        }        
    }

    public function single($id){
        $event = Event::where('id', $id)->get();
        return response()->json($event);
    }

    public function dibuka(){
    	$now = Carbon::today()->toDateString();
        $eventCheck = Event::where('tgl_akhir_regist', '>=', $now)->first();

        if (empty($eventCheck)){
            $notFound = 'Tidak Ada Event';
            $event = Event::where('tgl_akhir_regist', '>=', $now)->orderBy('id', 'desc')->paginate(10);
            return view('event.dibuka', ['events' => $event, 'notFound' => $notFound]);
        } else {
            $notFound = '';
            $event = Event::where('tgl_akhir_regist', '>=', $now)->orderBy('id', 'desc')->paginate(10);
            return view('event.dibuka', ['events' => $event, 'notFound' => $notFound]);
        }
    }

    public function ditutup(){
    	$now = Carbon::today()->toDateString();
        $eventCheck = Event::where('tgl_akhir_regist', '>=', $now)->first();

        if (empty($eventCheck)){
            $notFound = 'Tidak Ada Event';
            $event = Event::where('tgl_akhir_regist', '>=', $now)->orderBy('id', 'desc')->paginate(10);
            return view('event.ditutup', ['events' => $event, 'notFound' => $notFound]);
        } else {
            $notFound = '';
            $event = Event::where('tgl_akhir_regist', '>=', $now)->orderBy('id', 'desc')->paginate(10);
            return view('event.ditutup', ['events' => $event, 'notFound' => $notFound]);
        }
    }

    public function guest(Request $request){
        $check = AbsensiEvent::where('email', $request->email)->where('id_event', $request->event_id)->first();

        $eventNames = Event::where('id', $request->event_id)->pluck('nama_event');

        $eventName = str_replace('"]', '', $eventNames);
        $eventName = str_replace('["', '', $eventName);

        if(empty($check)){            

            AbsensiEvent::insert([
                'id_event' => $request->event_id,
                'email' => $request->email,
                'nama' => $request->nama,
                'kehadiran' => 'Pending',
                'rayon' => 'Rayon PMII Pencerahan Galileo',
            ]);

            return back()->with('success', 'Anda Berhasil Mendaftar Event ' . $eventName);
        } else {

            AbsensiEvent::where('id_event', $request->event_id)->where('email', $request->email)->update([
                'id_event' => $request->event_id,
                'email' => $request->email,
                'nama' => $request->nama,
                'kehadiran' => 'Pending',
                'rayon' => 'Rayon PMII Pencerahan Galileo',
            ]);

            return back()->with('success', 'Anda Sudah Mendaftar Event ' . $eventName);
        }
    }

    public function authed(Request $request){
        $check = AbsensiEvent::where('id_event', $request->event_id)->where('email', Auth::user()->email)->first();

        $eventNames = Event::where('id', $request->event_id)->pluck('nama_event');

        $eventName = str_replace('"]', '', $eventNames);
        $eventName = str_replace('["', '', $eventName);
        
        if(empty($check)){

            AbsensiEvent::insert([
                'id_event' => $request->event_id,
                'email' => Auth::user()->email,
                'nama' => Auth::user()->name,
                'rayon' => 'Rayon PMII Pencerahan Galileo',
                'kehadiran' => 'Pending',
            ]);

            return back()->with('success', 'Anda Berhasil Mendaftar Event ' . $eventName);
        } else {

            AbsensiEvent::where('id_event', $request->event_id)->where('email', Auth::user()->email)->update([
                'id_event' => $request->event_id,
                'email' => Auth::user()->email,
                'nama' => Auth::user()->name,
                'rayon' => 'Rayon PMII Pencerahan Galileo',
                'kehadiran' => 'Pending',
            ]);
            return back()->with('success', 'Anda Sudah Mendaftar Event ' . $eventName);
        }
    }
}
