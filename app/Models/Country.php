<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {
	protected $guarded = [ 'id', 'code', 'created_at', 'updated_at', 'deleted_at' ];

	public function region() {
		return $this->belongsTo( 'App\Models\Region' );
	}
}
