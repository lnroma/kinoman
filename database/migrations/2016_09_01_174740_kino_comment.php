<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KinoComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('kino_comment',function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nulable();
            $table->text('name')->nullable();
            $table->text('titles');
            $table->text('message');
            $table->integer('kino_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
