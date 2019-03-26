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
			$table->dropColumn( 'email_verified_at' );
			$table->string( 'login', 190 )->unique();
			$table->string( 'activation_code' )->nullable();
			$table->tinyInteger( 'is_active' )->default( 1 ); // пока ставим на активацию 1, дабы сделать ее позже
			$table->tinyInteger( 'is_blocked' )->default( 0 );
			$table->bigInteger( 'role_id' )->unsigned();
			$table->foreign( 'role_id' )->references( 'id' )->on( 'roles' );
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
			$table->timestamp( 'email_verified_at' )->nullable();
			$table->dropColumn( 'login' );
			$table->dropColumn( 'activation_code' );
			$table->dropColumn( 'is_active' );
			$table->dropColumn( 'is_blocked' );
			$table->dropForeign( 'role_id' );
			$table->dropColumn( 'role_id' );
		} );

	}
}
