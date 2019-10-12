<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
	protected $fillable = [
		'uuid',
		'name',
		'price',
		'photo',
		'description',
	];

	protected $appends = [
		'price_sell',
		'short_desc',
	];

	public function getPriceSellAttribute()
	{
		return 'Rp '.number_format($this->price, 0, 0, '.');
	}

	public function getShortDescAttribute()
	{
		return Str::limit($this->description);
	}
}
