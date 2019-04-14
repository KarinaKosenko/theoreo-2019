<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string( 'photo' )->nullable();
            $table->integer( 'vk_action_id')->unsigned()->default(1);
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
        Schema::dropIfExists('photo_models');
    }
}
