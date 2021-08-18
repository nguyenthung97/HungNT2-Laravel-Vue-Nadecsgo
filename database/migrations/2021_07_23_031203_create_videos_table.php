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
            $table->foreignId('pos_id')->constrained('positions')->onDelete('cascade');
            $table->string('VideoPath');
            $table->longtext('ResultImagePath');
            $table->longtext('LineUpImagePath');
            $table->string('views');
            $table->integer('favorites');
            $table->string('fullDetailedVideoName');
            $table->string('slug');
            $table->unsignedBigInteger('steam_id')->nullable();
            $table->foreign('steam_id')->references('steam_id')->on('users')->onDelete('cascade');
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
