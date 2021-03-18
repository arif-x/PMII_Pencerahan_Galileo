<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PesertaEventPengkaderan;
use DataTables;

class PesertaEventPengkaderanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request){ 
		if ($request->ajax()) {
			$data = PesertaEventPengkaderan::join('event_pengkaderans', 'event_pengkaderans.id', '=', 'peserta_event_pengkaderan.event_id')
			->join('users', 'users.id', '=', 'peserta_event_pengkaderan.user_id')
			->orderBy('event_id', 'desc')
			->select('event_pengkaderans.nama_event', 'users.name', 'users.angkatan')
			->get();
			return Datatables::of($data)
			->addIndexColumn()
			->make(true);
		}

		return view('admin.pesertaEventPengkaderan');
	}
}
