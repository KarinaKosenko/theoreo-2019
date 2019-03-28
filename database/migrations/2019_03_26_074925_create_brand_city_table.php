<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandCityTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'brand_city', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->bigInteger( 'brand_id' )->unsigned();
			$table->bigInteger( 'city_id' )->unsigned();
			$table->foreign( 'brand_id' )->references( 'id' )->on( 'brands' );
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
		Schema::dropIfExists( 'brand_city' );
	}
}
