<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop_products extends Model
{
	public function scopeActive($query)
	{
		return $query->where('deleted_status', 0);
	}
}
