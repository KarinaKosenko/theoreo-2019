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
}
