<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'uuid',
		'users_id',
		'name',
	];

	public function user()
	{
		return $this->belongsTo('App\Models\User', 'users_id');
	}
}
