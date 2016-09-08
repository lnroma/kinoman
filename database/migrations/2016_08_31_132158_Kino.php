<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kino extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kino',function (Blueprint $table){
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('created_at');
            $table->boolean('published')->default(false);
        });

        Schema::create('kino_attributes',function (Blueprint $table){
            $table->increments('id');
            $table->integer('kino_id');
            $table->text('type');
            $table->text('frontend_name');
            $table->text('backend_name');
        });

        Schema::create('kino_attributes_value',function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kino_id');
            $table->integer('attribute_id');
            $table->text('value');
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
