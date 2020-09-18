<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo');
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('media_catagory_id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->string('author');
            $table->text('description');
            $table->string('content_type');
            $table->integer('view');
            $table->integer('download');
            $table->text('keyword');
            $table->string('type');
            $table->string('file_name');
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
        Schema::dropIfExists('media');
    }
}
