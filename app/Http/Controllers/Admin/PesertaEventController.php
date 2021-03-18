<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PesertaEvent;
use DataTables;

class PesertaEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request){ 
		if ($request->ajax()) {
			$data = PesertaEvent::join('events', 'events.id', '=', 'peserta_event.event_id')
			->join('users', 'users.id', '=', 'peserta_event.user_id')
			->orderBy('event_id', 'desc')
			->select('events.nama_event', 'users.name', 'users.angkatan')
			->get();
			return Datatables::of($data)
			->addIndexColumn()
			->make(true);
		}

		return view('admin.pesertaEvent');
	}
}
