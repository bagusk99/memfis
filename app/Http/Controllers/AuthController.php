<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Customer;
use Validator;
use Hash;
use Auth;

class AuthController extends Controller
{
	public function login()
	{
		return view('auth.login');
	}

	public function register()
	{
		return view('auth.register');
	}

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

	function do_register(Request $request)
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
				'roles_id' => 2, 
				'email' => $request->email, 
				'password' => Hash::make($request->retypePassword), 
			]);

			Customer::create([
				'uuid' => Str::uuid()->toString(), 
				'users_id' => $user->id,
				'name' => $request->name, 
			]);

			Auth::loginUsingId($user->id);

			return redirect()->route('/')->with([
				'success' => 'Welcome'
			]);
		} catch (\Exception $e) {
			return redirect()->back()->with([
				'error' => $e->errorInfo[2]
			]);
		}
	}

	function do_login(Request $request)
	{
		Validator::make($request->all(), [
			'email' => 'required|email',
			'password' => 'required|min:8',
		])->validate();

		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {
			return redirect()->back();
        }
	}

	public function logout(Request $request)
	{
		Auth::logout();
		return redirect()->route('/');
	}
	
}
