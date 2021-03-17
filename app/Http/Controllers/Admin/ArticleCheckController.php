<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cms;

class ArticleCheckController extends Controller
{
    public function index($url){
    	$data = Cms::where('url', $url)->get();
    	return view('blog.single', ['datas' => $data]);
    }
}
