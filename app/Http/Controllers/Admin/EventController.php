<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Event;

class EventController extends Controller {
    
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request){ 
		if ($request->ajax()) {
			$data = Event::get();
			return Datatables::of($data)
			->addIndexColumn()
			->addColumn('action', function($row){

				$btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editEvent">Edit</a>';

				$btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteEvent">Delete</a>';

				return $btn;
			})
			->rawColumns(['action'])
			->make(true);
		}

		return view('admin.event');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    	Event::updateOrCreate(
            ['id' => $request->event_id],
    		[
                'nama_event' => $request->nama_event,
                'event_angkatan' => $request->event_angkatan,
                'tgl_mulai_regist' => $request->tgl_mulai_regist,
                'tgl_akhir_regist' => $request->tgl_akhir_regist,                
                'tgl_mulai' => $request->tgl_mulai,
                'tgl_akhir' => $request->tgl_akhir,
            ]
        );        

    	return response()->json(['success'=>'Data Event Disimpan.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    	$event = Event::find($id);
    	return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
    	Event::find($id)->delete();

    	return response()->json(['success'=>'Data Event Dihapus.']);
    }

}
