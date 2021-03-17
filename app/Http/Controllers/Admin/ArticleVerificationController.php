<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cms;
use DataTables;

class ArticleVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request){ 
		if ($request->ajax()) {
			$data = Cms::get();
			return Datatables::of($data)
			->addIndexColumn()
			->addColumn('lihat', function($row){
                $url = '<a href="/admin/see-article/'.$row->url.'" target="_blank">Lihat Artikel</a>'; 

                return $url;
            })
            ->addColumn('verification', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Detail" class="edit btn btn-primary btn-sm verify">Verifikasi</a>';

                return $btn;
            })
			->rawColumns(['verification', 'lihat'])
			->make(true);
		}

		return view('admin.cms');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    	Cms::updateOrCreate(
            ['id' => $request->artikel_id],
    		[
                'status' => $request->status,
            ]
        );        

    	return response()->json(['success'=>'Data Kader Disimpan.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cms  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    	$article = Cms::find($id);
    	return response()->json($article);
    }
}
