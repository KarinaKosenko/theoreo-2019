<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model {
	protected $guarded = [ 'id', 'code', 'created_at', 'updated_at', 'deleted_at' ];

	public function city() {
		return $this->hasMany( 'App\Models\City' );
	}

	public function country() {
		return $this->belongsTo( 'App\Models\Country' );
	}
}