<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionCategory extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'action_category', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->bigInteger( 'action_id' )->unsigned();
			$table->bigInteger( 'category_id' )->unsigned();
			$table->foreign( 'action_id' )->references( 'id' )->on( 'actions' );
			$table->foreign( 'category_id' )->references( 'id' )->on( 'categories' );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'action_category' );
	}
}
