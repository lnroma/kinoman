<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        return;
        Schema::create('category',function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('title');
            $table->text('description');
            $table->text('seo_title');
            $table->text('seo_description');
        });
        //
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
