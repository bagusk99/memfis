<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
		'uuid',
		'employees_id',
		'customers_id',
		'products_id',
		'total',
	];

	public function employee()
	{
		return $this->belongsTo('App\Models\Employee', 'employees_id');
	}

	public function customer()
	{
		return $this->belongsTo('App\Models\Customer', 'customers_id');
	}

	public function product()
	{
		return $this->belongsTo('App\Models\Product', 'products_id');
	}
}
