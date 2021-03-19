<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AbsensiEvent;
use DataTables;

class AbsensiEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){ 
    	if ($request->ajax()) {
    		$data = AbsensiEvent::join('events', 'events.id', '=', 'absensi_event.id_event')
            ->select('events.nama_event as event', 'absensi_event.*')
            ->get();

            // dd($data);
    		return Datatables::of($data)
    		->addIndexColumn()
    		->addColumn('option', function($row){
    			$btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Detail" class="edit btn btn-primary btn-sm opsi">Edit Kehadiran</a>';

    			return $btn;
    		})
            ->rawColumns(['option'])
    		->make(true);
    	}

    	return view('admin.absensiEvent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    	AbsensiEvent::updateOrCreate(
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
     * @param  \App\AbsensiEvent  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    	$article = AbsensiEvent::find($id);
    	return response()->json($article);
    }
}
