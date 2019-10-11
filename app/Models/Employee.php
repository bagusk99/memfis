<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
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
