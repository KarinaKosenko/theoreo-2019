<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVkActionPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vk_action_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string( 'photo' )->nullable();
            $table->integer( 'vk_action_id')->unsigned();
            $table->foreign( 'vk_action_id' )->references('id')->on('vk_actions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vk_action_photos');
    }
}
