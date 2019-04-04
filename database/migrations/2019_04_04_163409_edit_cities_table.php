<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCitiesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table( 'cities', function ( Blueprint $table ) {
			$table->dropForeign( [ 'regions_id' ] );
			$table->dropColumn( 'regions_id' );
			$table->bigInteger( 'region_id' )->unsigned();
			$table->foreign( 'region_id' )->references( 'id' )->on( 'regions' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table( 'cities', function ( Blueprint $table ) {
			$table->bigInteger( 'regions_id' )->unsigned();
			$table->foreign( 'regions_id' )->references( 'id' )->on( 'regions' );
			$table->dropForeign( [ 'region_id' ] );
			$table->dropColumn( 'region_id' );
		} );
	}
}
