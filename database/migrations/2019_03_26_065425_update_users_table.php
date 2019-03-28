<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table( 'users', function ( Blueprint $table ) {
			$table->dropColumn( 'name' );
			$table->string( 'login', 190 )->unique();
			$table->string( 'activation_code' )->nullable();
			$table->tinyInteger( 'is_active' )->default( 1 ); // пока ставим на активацию 1, дабы сделать ее позже
			$table->tinyInteger( 'is_blocked' )->default( 0 );
			$table->softDeletes();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table( 'users', function ( Blueprint $table ) {
			$table->string( 'name' );
			$table->dropColumn( [ 'login', 'activation_code', 'is_active', 'is_blocked' ] );
		} );

	}
}
