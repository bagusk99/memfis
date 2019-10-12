<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
		'uuid',
		'name',
		'price',
		'photo',
		'description',
	];

	protected $appends = ['price_sell'];

	public function getPriceSellAttribute()
	{
		return 'Rp '.number_format($this->price, 0, 0, '.');
	}
}
