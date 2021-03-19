<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AbsensiEvent;

class AbsensiEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){ 
    	if ($request->ajax()) {
    		$data = AbsensiEvent::get();
    		return Datatables::of($data)
    		->addIndexColumn()
    		->addColumn('verification', function($row){
    			$btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Detail" class="edit btn btn-primary btn-sm verify">Verifikasi</a>';

    			return $btn;
    		})
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
    		['id' => $request->artikel_id],
    		[
    			'status' => $request->status,
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
