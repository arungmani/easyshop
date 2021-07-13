<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_offers extends Model
{
    public function scopeActive($query)
	{
		return $query->where('deleted_status', 0);
	}//
}
