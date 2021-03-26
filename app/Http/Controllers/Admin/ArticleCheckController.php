<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cms;

class ArticleCheckController extends Controller
{
    public function index($url){
    	$select = Cms::where('url', $url)->first();
        if(!empty($select)){
            $notFoundCode = '';
            $notFound = '';
            $data = Cms::where('url', $url)->get();            
            return view('blog.single', ['datas' => $data, 'notFound' => $notFound, 'notFoundCode' => $notFoundCode]); 
        } else {           
            $notFoundCode = '404'; 
            $notFound = 'Artikel Tidak Ada atau Telah Dihapus';
            $data = Cms::where('url', $url)->get();            
            return view('blog.single', ['datas' => $data, 'notFound' => $notFound, 'notFoundCode' => $notFoundCode]); 
        }
    }
}
