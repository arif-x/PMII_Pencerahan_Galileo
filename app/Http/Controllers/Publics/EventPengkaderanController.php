<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EventPengkaderan;
use App\AbsensiEventKaderisasi;
use Carbon\Carbon;
use Auth;

class EventPengkaderanController extends Controller
{
    public function index(){
    	$eventCheck = EventPengkaderan::first();

        if (empty($eventCheck)){
            $notFound = 'Tidak Ada Event';
            $event = EventPengkaderan::orderBy('id', 'desc')->paginate(10);
            return view('eventPengkaderan.index', ['events' => $event, 'notFound' => $notFound]);
        } else {
            $notFound = '';
            $event = EventPengkaderan::orderBy('id', 'desc')->paginate(10);
            return view('eventPengkaderan.index', ['events' => $event, 'notFound' => $notFound]);
        }   
    }

    public function single($id){
        $event = EventPengkaderan::where('id', $id)->get();
        return response()->json($event);
    }

    public function dibuka(){
    	$now = Carbon::today()->toDateString();
        $eventCheck = EventPengkaderan::where('tgl_akhir_regist', '>=', $now)->first();

        if (empty($eventCheck)){
            $notFound = 'Tidak Ada Event';
            $event = EventPengkaderan::where('tgl_akhir_regist', '>=', $now)->orderBy('id', 'desc')->paginate(10);
            return view('eventPengkaderan.dibuka', ['events' => $event, 'notFound' => $notFound]);
        } else {
            $notFound = '';
            $event = EventPengkaderan::where('tgl_akhir_regist', '>=', $now)->orderBy('id', 'desc')->paginate(10);
            return view('eventPengkaderan.dibuka', ['events' => $event, 'notFound' => $notFound]);
        }
    }

    public function ditutup(){
    	$now = Carbon::today()->toDateString();
        $eventCheck = EventPengkaderan::where('tgl_akhir_regist', '<', $now)->first();

        if (empty($eventCheck)){
            $notFound = 'Tidak Ada Event';
            $event = EventPengkaderan::where('tgl_akhir_regist', '<', $now)->orderBy('id', 'desc')->paginate(10);
            return view('eventPengkaderan.ditutup', ['events' => $event, 'notFound' => $notFound]);
        } else {
            $notFound = '';
            $event = EventPengkaderan::where('tgl_akhir_regist', '<', $now)->orderBy('id', 'desc')->paginate(10);
            return view('eventPengkaderan.ditutup', ['events' => $event, 'notFound' => $notFound]);
        }
    }

    public function join(Request $request){
        $check = AbsensiEventKaderisasi::where('id_event', $request->event_id)->where('id_user', $request->user_id)->first();

        $eventNames = EventPengkaderan::where('id', $request->event_id)->pluck('nama_event');

        $eventName = str_replace('"]', '', $eventNames);
        $eventName = str_replace('["', '', $eventName);


        if (empty($check)){
            AbsensiEventKaderisasi::create([
                'id_event' => $request->event_id,
                'id_user' => Auth::user()->id,
                'nama' => Auth::user()->name,
                'kehadiran' => 'Pending'
            ]);
            return back()->with('success', 'Anda Berhasil Mendaftar Event ' . $eventName);
        } else {

            AbsensiEventKaderisasi::where('id_event', $request->event_id)->where('id_user', Auth::user()->id)->update([
                'id_event' => $request->event_id,
                'id_user' => Auth::user()->id,
                'nama' => Auth::user()->name,
                'kehadiran' => 'Pending'
            ]);

            return back()->with('success', 'Anda Sudah Mendaftar Event ' . $eventName);
        }
    }
}
