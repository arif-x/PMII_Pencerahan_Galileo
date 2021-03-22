<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ApiToken;

class KaderController extends Controller
{
    public function index(Request $request){
    	$data = [];
    	$apiToken = ApiToken::where('functions', 'kader')->where('api_token', $request->api_token)->first();
    	if(!empty($apiToken)){
    		$kader = User::where('email', '!=', 'admin@pmiigalileo.or.id')->get();
    		$data ['kader'] = $kader;
    		return response()->json(['status' => '200', 'data' => $data]);
    	} else {
    		return response()->json(['status' => 'Error 500']);
    	}
    }
}
