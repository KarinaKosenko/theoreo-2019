<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model {
	protected $guarded = [ 'id', 'code', 'created_at', 'updated_at', 'deleted_at' ];

	public function categories() {
		return $this->belongsToMany( 'App\Models\Category' );
	}

	public function cities() {
		return $this->belongsToMany( 'App\Models\City' );
	}

	public function action() {
		return $this->belongsTo( 'App\Models\Action' );
	}

}
