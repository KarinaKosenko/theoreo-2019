<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionTagTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'action_tag', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->bigInteger( 'action_id' )->unsigned();
			$table->bigInteger( 'tag_id' )->unsigned();
			$table->foreign( 'action_id' )->references( 'id' )->on( 'actions' );
			$table->foreign( 'tag_id' )->references( 'id' )->on( 'tags' );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'action_tag' );
	}
}
