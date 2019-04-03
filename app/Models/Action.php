<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model {
	protected $guarded = [ 'id', 'code', 'created_at', 'updated_at', 'deleted_at' ];

	public function tags() {
		return $this->belongsToMany( 'App\Models\Tag' );
	}

	public function cities() {
		return $this->belongsToMany( 'App\Models\City' );
	}

	public function brand() {
		return $this->belongsTo( 'App\Models\Brand' );
	}

	public function categories() {
		return $this->belongsTo( 'App\Models\Category' );
	}

}