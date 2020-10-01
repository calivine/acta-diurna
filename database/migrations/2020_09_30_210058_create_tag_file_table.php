<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_file', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            
            $table->integer('tag_id')->unsigned();
            $table->integer('file_id')->unsigned();

            # Make foreign keys
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('file_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_file');
    }
}
