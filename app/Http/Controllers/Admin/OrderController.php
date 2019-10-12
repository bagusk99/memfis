<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\Product;
use Datatables;
use Validator;
use Hash;

class OrderController extends Controller
{
	function datatable()
	{
		return Datatables::collection(
			Order::with([
				'employee',
				'customer',
				'product',
			])->get()
		)->make();
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('back.pages.order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$d['action'] = route('order.store');

		$d['employee'] = Employee::orderBy('id', 'DESC')
			->where('name', '!=', 'Admin')->get();
		$d['customer'] = Customer::orderBy('id', 'DESC')->get();
		$d['product'] = Product::orderBy('id', 'DESC')->get();

		return view('back.pages.order.form', $d);
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
			'employees_id' => 'required|numeric',
			'customers_id' => 'required|numeric',
			'products_id' => 'required|numeric',
			'total' => 'required|numeric',
		];

		if ($request->rule) {
			$rule = array_merge($rule, $request->rule);
			unset($request['rule']);
		}

		Validator::make($request->all(), $rule)->validate();
	}
	
    public function store(Request $request)
    {
		$this->valid($request);

		try {
			$request->request->add([
				'uuid' => Str::uuid()->toString()
			]);

			Order::create($request->only([
				'uuid',
				'employees_id',
				'customers_id',
				'products_id',
				'total',
			]));

			return redirect()->route('order.index')->with([
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
		$d['data'] = Order::find($id);
		$d['action'] = route('order.update', $id);


		$d['employee'] = Employee::orderBy('id', 'DESC')
			->where('name', '!=', 'Admin')->get();
		$d['customer'] = Customer::orderBy('id', 'DESC')->get();
		$d['product'] = Product::orderBy('id', 'DESC')->get();

		return view('back.pages.order.form', $d);
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
		$this->valid($request);

		$field = [
			'uuid',
			'employees_id',
			'customers_id',
			'products_id',
			'total',
		];

		Order::where('id', $id)
			->update($request->only($field));

		return redirect()->route('order.index')->with([
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
		$order = Order::find($id);
		$order->delete();

		return redirect()->back()->with([ 'success' => 'Data Deleted' ]);
    }
}
