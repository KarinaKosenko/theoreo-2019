<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'regions', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->string( 'name', 190 )->unique();
			$table->string( 'code' );
			$table->bigInteger( 'country_id' )->unsigned();
			$table->foreign( 'country_id' )->references( 'id' )->on( 'countries' );
			$table->timestamps();
			$table->softDeletes();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'regions' );
	}
}
