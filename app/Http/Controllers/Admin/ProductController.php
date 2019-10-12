<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use Datatables;
use Validator;
use Hash;

class ProductController extends Controller
{
	function datatable()
	{
		return Datatables::collection(
			Product::all()
		)->make();
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('back.pages.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$d['action'] = route('product.store');
		return view('back.pages.product.form', $d);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

	function valid($request)
	{
		$rule = [
			'name' => 'required|max:30',
			'price' => 'required',
			'description' => 'required',
			'product_photo' => 'image|mimes:jpeg,png,jpg|max:2048',
		];

		if ($request->rule) {
			$rule = array_merge($rule, $request->rule);
			unset($request['rule']);
		}

		Validator::make($request->all(), $rule)->validate();
	}
	
    public function store(Request $request)
    {
		$request->request->add([
			'rule' => [
				'product_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
			]
		]);

		$this->valid($request);

		try {
			$request->request->add([
				'uuid' => Str::uuid()->toString()
			]);

			$upload = $request->file('product_photo')->store('assets/img');

			$request->request->add([
				'photo' => '/'.$upload
			]);

			Product::create($request->only([
				'uuid',
				'name',
				'price',
				'photo',
				'description',
			]));

			return redirect()->route('product.index')->with([
				'success' => 'Data Saved'
			]);
		} catch (\Exception $e) {
			return redirect()->back()->with([
				'error' => $e->errorInfo[2]
			]);
		}

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$d['data'] = Product::find($id);
		$d['action'] = route('product.update', $id);
		return view('back.pages.product.form', $d);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$product = Product::find($id);

		$this->valid($request);

		$field = [
			'uuid',
			'name',
			'price',
			'description',
		];

		if ($request->product_photo) {
			$request->request->add([
				'rule' => [
					'product_photo' =>
				   	'required|image|mimes:jpeg,png,jpg|max:2048',
				]
			]);

			$this->valid($request);

			$upload = $request->file('product_photo')->store('assets/img');

			if ($product->photo != '/assets/img/default.jpg') {
				@unlink(public_path().$product->photo);
			}

			array_push($field, 'photo');

			$request->request->add([
				'photo' => '/'.$upload
			]);
		}

		Product::where('id', $id)
			->update($request->only($field));

		return redirect()->route('product.index')->with([
			'success' => 'Data Changed'
		]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$product = Product::find($id);
		$product->delete();

		if ($product->photo != '/assets/img/default.jpg') {
			@unlink(public_path().$product->photo);
		}

		return redirect()->back()->with([ 'success' => 'Data Deleted' ]);
    }
}
