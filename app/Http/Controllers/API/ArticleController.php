<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cms;
use App\ApiToken;

class ArticleController extends Controller
{
    public function index(Request $request){
    	$data = [];
    	$apiToken = ApiToken::where('functions', 'article')->where('api_token', $request->api_token)->first();
    	if(!empty($apiToken)){
    		$article = Cms::get();
    		$data ['article'] = $article;
    		return response()->json(['status' => '200', 'data' => $data]);
    	} else {
    		return response()->json(['status' => 'Error 500']);
    	}
    }
}
