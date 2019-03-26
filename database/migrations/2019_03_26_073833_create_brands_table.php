<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'brands', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->string( 'name', 190 )->unique();
			$table->string( 'img' );
			$table->string( 'site_url' )->nullable();
			$table->string( 'vk_url' )->nullable();
			$table->string( 'code' );
			$table->string( 'phone' );
			$table->string( 'sell_address' )->nullable();
			$table->enum( 'type', [ 'federal_brand', 'internet_shop' ] );
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
		Schema::dropIfExists( 'brands' );
	}
}
