<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionCityTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'action_city', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->bigInteger( 'action_id' )->unsigned();
			$table->bigInteger( 'city_id' )->unsigned();
			$table->foreign( 'action_id' )->references( 'id' )->on( 'actions' );
			$table->foreign( 'city_id' )->references( 'id' )->on( 'cities' );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'action_city' );
	}
}
