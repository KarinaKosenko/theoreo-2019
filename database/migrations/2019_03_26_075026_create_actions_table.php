<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'actions', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->string( 'title' );
			$table->string( 'text' );
			$table->string( 'code' );
			$table->date( 'date_start' );
			$table->date( 'date_end' );
			$table->float( 'rating' );
			$table->integer( 'priority' )->default( 0 );
			$table->boolean( 'is_paid' );
			$table->string( 'store_url' );
			$table->enum( 'type', [ 'discount', 'sale' ] );
			$table->string( 'img' );
			$table->bigInteger( 'brand_id' )->unsigned();
			$table->bigInteger( 'category_id' )->unsigned();
			$table->foreign( 'brand_id' )->references( 'id' )->on( 'brands' );
			$table->foreign( 'category_id' )->references( 'id' )->on( 'categories' );
			$table->string( 'address' );
			$table->string( 'phone' );
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
		Schema::dropIfExists( 'actions' );
	}
}
