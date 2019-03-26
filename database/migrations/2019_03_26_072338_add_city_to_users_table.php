<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityToUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table( 'users', function ( Blueprint $table ) {
			$table->bigInteger( 'city_id' )->unsigned();
			$table->foreign( 'city_id' )->references( 'id' )->on( 'cities' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table( 'users', function ( Blueprint $table ) {
			$table->dropForeign( 'city_id' );
			$table->dropColumn( 'city_id' );
		} );
	}
}
