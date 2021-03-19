<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AbsensiEventKaderisasi;
use DataTables;

class AbsensiEventKaderisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){ 
    	if ($request->ajax()) {
    		$data = AbsensiEventKaderisasi::join('users', 'users.id', '=', 'absensi_event_kaderisasi.id_user')
    		->join('event_pengkaderans', 'event_pengkaderans.id', '=', 'absensi_event_kaderisasi.id_event')
    		->select('users.name', 'event_pengkaderans.nama_event as event', 'absensi_event_kaderisasi.*')
    		->get();

    		return Datatables::of($data)
    		->addIndexColumn()
    		->addColumn('option', function($row){
    			$btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Detail" class="edit btn btn-primary btn-sm opsi">Edit Kehadiran</a>';

    			return $btn;
    		})
    		->rawColumns(['option'])
    		->make(true);
    	}

    	return view('admin.absensiEventKaderisasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    	AbsensiEventKaderisasi::updateOrCreate(
    		['id' => $request->absensi_id],
    		[
    			'kehadiran' => $request->kehadiran,
    		]
    	);        

    	return response()->json(['success'=>'Data Absensi Disimpan.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AbsensiEventKaderisasi  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    	$article = AbsensiEventKaderisasi::find($id);
    	return response()->json($article);
    }
}
