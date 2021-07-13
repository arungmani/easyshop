<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class Shop extends Model

{

    public function scopeActive($query)

	{

		return $query->orderBy('deleted_status', 'ASC');

	}

}

