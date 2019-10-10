<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
		'uuid',
		'name',
		'price',
		'description',
	];

	protected $appends = ['price_sell'];

	public function getPriceSellAttribute()
	{
		return number_format($this->price, 0, 0, '.');
	}
	
}
