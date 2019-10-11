<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Customer;
use Datatables;
use Validator;
use Hash;

class CustomerController extends Controller
{
	function datatable()
	{
		return Datatables::collection(
			Customer::with('user')->get()
		)->make();
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('back.pages.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$d['action'] = route('customer.store');
		return view('back.pages.customer.form', $d);
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
			'email' => 'required|email',
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
				'password' => 'required|min:8',
				'retypePassword' => 'required|min:8|same:password',
			]
		]);

		$this->valid($request);

		try {
			$user = User::create([
				'uuid' => Str::uuid()->toString(), 
				'roles_id' => 1, 
				'email' => $request->email, 
				'password' => Hash::make($request->retypePassword), 
			]);

			Customer::create([
				'uuid' => Str::uuid()->toString(), 
				'users_id' => $user->id,
				'name' => $request->name, 
			]);

			return redirect()->route('customer.index')->with([
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
		$d['data'] = Customer::find($id);
		$d['action'] = route('customer.update', $id);
		return view('back.pages.customer.form', $d);
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
		$customer = Customer::find($id);

		$this->valid($request);

		$field = ['email'];

		//check if password filled
		if ($request->password) {

			$request->request->add([
				'rule' => [
					'password' => 'required|min:8',
					'retypePassword' => 'required|min:8|same:password',
				]
			]);

			$this->valid($request);

			$request->merge(['password' => Hash::make($request->password)]);

			array_push($field, 'password');
		}

		Customer::where('id', $id)->update([
			'name' => $request->name
		]);

		try {
			User::where('id', $customer->users_id)
				->update($request->only($field));
			
			return redirect()->route('customer.index')->with([
				'success' => 'Data Changed'
			]);
		} catch (\Exception $e) {
			return redirect()->back()->with([
				'error' => $e->errorInfo[2]
			]);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$customer = Customer::find($id);
		$customer->delete();
		User::destroy($customer->users_id);

		return redirect()->back()->with([ 'success' => 'Data Deleted' ]);
    }
}
