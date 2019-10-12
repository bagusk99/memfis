<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Employee;
use Auth;

class DashboardController extends Controller
{
	public function index()
	{
		$d['product'] = Product::count();
		$d['order'] = Order::count();
		$d['customer'] = Customer::count();
		$d['employee'] = Employee::where('name', '!=', 'Admin')->count();

		return view('back/pages/dashboard', $d);
	}
	
}
