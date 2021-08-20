<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('VideoName');
            $table->unsignedBigInteger('pos_id');
            $table->string('VideoPath');
            $table->longtext('ResultImagePath');
            $table->longtext('LineUpImagePath');
            $table->string('views')->nullable();
            $table->integer('favorites')->nullable();
            $table->string('fullDetailedVideoName');
            $table->string('slug');
            $table->unsignedBigInteger('steam_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            // $table->foreign('steam_id')->references('steam_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
