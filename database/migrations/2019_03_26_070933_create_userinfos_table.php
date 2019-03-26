<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserinfosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'userinfos', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->bigInteger( 'user_id' )->unsigned();
			$table->foreign( 'user_id' )->references( 'id' )->on( 'users' );
			$table->string( 'first_name' )->nullable();
			$table->string( 'last_name' )->nullable();
			$table->string( 'patronymic' )->nullable();
			$table->string( 'img' )->nullable();
			$table->enum( 'sex', [ 'male', 'female' ] )->nullable();
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
		Schema::dropIfExists( 'userinfos' );
	}
}
