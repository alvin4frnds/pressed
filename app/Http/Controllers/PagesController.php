<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
	
	public function index( Request $request ) {
		$data = [
			'user' => Auth::user(),
			'request' => $request->all(),
		];
		
		return view('index', compact('data'));
    }
}
