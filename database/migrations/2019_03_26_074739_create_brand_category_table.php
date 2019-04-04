<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandCategoryTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
            Schema::create('brand_category', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('brand_id')->unsigned();
                $table->bigInteger('category_id')->unsigned();
                $table->foreign('brand_id')->references('id')->on('brands');
                $table->foreign('category_id')->references('id')->on('categories');
                $table->timestamps();
            });
        }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
        Schema::dropIfExists( 'brand_caregory' );
        Schema::dropIfExists( 'brand_category' );
	}
}
