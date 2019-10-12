<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AppController extends Controller
{
	public function index()
	{
		$d['product'] = Product::orderBy('id', 'DESC')->get();
		return view('front.pages.front', $d);
	}

	public function product(Request $request)
	{
		$d['product'] = Product::find($request->id);
		return view('front.pages.product', $d);
	}
	
}
