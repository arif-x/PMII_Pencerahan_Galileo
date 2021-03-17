<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DataTables;

class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request){ 
		if ($request->ajax()) {
			$data = User::get();
			return Datatables::of($data)
			->addIndexColumn()
            ->addColumn('pasfoto', function($row){
                $data = '<a href="/admin/kader/'.$row->nim.'/photo/pasphoto" target="_blank">Lihat Pasphoto</a>'; 

                return $data;
            })
            ->addColumn('ktm', function($row){
                $data = '<a href="/admin/kader/'.$row->nim.'/photo/ktm" target="_blank">Lihat KTM</a>'; 

                return $data;
            })
            ->addColumn('detail', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Detail" class="edit btn btn-primary btn-sm detailKader">Lihat Detail</a>';

                return $btn;                
            })
			->addColumn('action', function($row){

				$btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editKader">Edit</a>';

				$btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteKader">Delete</a>';

				return $btn;
			})
			->rawColumns(['pasfoto', 'ktm', 'detail' ,'action'])
			->make(true);
		}

		return view('admin.kader');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    	User::updateOrCreate(
            ['id' => $request->kader_id],
    		[
                'status_kaderisasi' => $request->status_kaderisasi,
                'verifikasi' => $request->verifikasi
            ]
        );        

    	return response()->json(['success'=>'Data Kader Disimpan.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    	$user = User::find($id);
    	return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
    	User::find($id)->delete();

    	return response()->json(['success'=>'Data Kader Dihapus.']);
    }

    public function show($id){
        $user = User::find($id);
        return response()->json($user);   
    }
}
