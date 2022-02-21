<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model 
{
	protected $fillable =[
		'id',
		'name',
		'price',
		'code',
		'user_id'
	];
	
	public function user()
	{
		return $this->belongsTo(User::class, foreignKey:'user_id', ownerKey:'id');
	}
	
}