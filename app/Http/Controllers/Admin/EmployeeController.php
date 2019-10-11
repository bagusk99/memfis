<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Employee;
use Datatables;
use Validator;

class EmployeeController extends Controller
{
	function datatable()
	{
		return Datatables::collection(
			Employee::with('user')->get()
		)->make();
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('back.pages.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$d['action'] = route('employee.store');
		return view('back.pages.employee.form', $d);
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
			'email' => 'required|email|unique:users,email',
		];

		if ($request->rule) {
			$rule = array_merge($rule, $request->rule);
			unset($request['rule']);
		}

		dd($rule);

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

		$user = User::create([
			'uuid' => Str::uuid()->toString(), 
			'roles_id' => 1, 
			'email' => $request->email, 
			'password' => $request->retypePassword, 
		]);

		Employee::create([
			'uuid' => Str::uuid()->toString(), 
			'users_id' => $user->id,
			'name' => $request->name, 
		]);

		return redirect()->route('employee.index')->with([
			'success' => 'Data Saved'
		]);
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
		$d['data'] = Employee::find($id);
		$d['action'] = route('employee.update', $id);
		return view('back.pages.employee.form', $d);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		Employee::destroy($id);

		return redirect()->back()->with([ 'success' => 'Data Deleted' ]);
    }
}
