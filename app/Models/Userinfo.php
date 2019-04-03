<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model {
	protected $guarded = [ 'id', 'created_at', 'updated_at', 'deleted_at' ];

	public function user() {
		return $this->belongsTo( 'App\Models\User' );
	}
}