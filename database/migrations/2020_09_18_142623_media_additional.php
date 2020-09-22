<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MediaAdditional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_view', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('media_id')->unsigned();
            $table->timestamps();
        });
        Schema::create('media_download', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('media_id')->unsigned();
            $table->timestamps();
        });
        Schema::create('mcatagory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });
        Schema::create('mcatagory_media', function (Blueprint $table) {
            $table->bigInteger('mcatagory_id')->unsigned();
            $table->bigInteger('media_id')->unsigned();
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
        Schema::dropIfExists('media_view');
        Schema::dropIfExists('media_download');
        Schema::dropIfExists('mcatagory');
    }
}
