<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pengurus;
use DataTables;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request){ 
		if ($request->ajax()) {
			$data = Pengurus::get();
			return Datatables::of($data)			
			->addIndexColumn()
			->addColumn('action', function($row){

				$btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPengurus">Edit</a>';

				$btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePengurus">Delete</a>';

				return $btn;
			})
			->rawColumns(['action'])
			->make(true);
		}

		return view('admin.pengurus');
	}

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    	$nim = $request->nim;
    	$getNim = strstr($nim, ' *', true);

		$nama = strstr($nim, '* ', false);    	
    	$getNama = str_replace('* ', '', $nama);

    	Pengurus::updateOrCreate(
            ['id' => $request->pengurus_id],
    		[
                'nim' => $getNim,
                'nama' => $getNama,
                'jabatan' => $request->jabatan
            ]
        );        

    	return response()->json(['success'=>'Data Pengurus Disimpan.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    	$pengurus = Pengurus::find($id);
    	return response()->json($pengurus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Pengurus::find($id)->delete();

        return response()->json(['success'=>'Pengurus Dihapus.']);
    }
}
