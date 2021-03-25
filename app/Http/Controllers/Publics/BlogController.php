<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cms;
use DB;

class BlogController extends Controller
{
    public function index(){
    	$data = Cms::where('status', 'Terverifikasi')->paginate(10);
    	return view('blog.index', ['datas' => $data]);
    }

    public function single($url){
    	$data = Cms::where('status', 'Terverifikasi')->where('url', $url)->get();
        $views = Cms::where('url', $url)->update([
            'views'=> DB::raw('views+1'),
        ]);
    	return view('blog.single', ['datas' => $data]);	
    }

    public function category($cat){
    	$data = Cms::where('status', 'Terverifikasi')->where('category', $cat)->get();
    	return view('blog.category', ['datas' => $data]);	
    }
}
