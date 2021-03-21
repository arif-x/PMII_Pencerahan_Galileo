<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class SearchKaderController extends Controller
{
	function search(Request $request){
		if($request->get('query')){
			$query = $request->get('query');
			$data = User::where('nim', 'LIKE', "%{$query}%")
			->get();
			$output = '';
			foreach($data as $row)
			{
				$output .= '
				<a href="#" class="dropdown-item"><li>' . $row->nim . ' * ' . $row->name . '</li></a>';
			}
			$output .= '';
			echo $output;
		}
	}
}
