<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kino1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kino',function (Blueprint $table){
            $table
                ->dateTime('created_at')
                ->nullable()
                ->change();
        });

        Schema::table('kino_attributes',function (Blueprint $table){
            $table->dropColumn('kino_id');
            $table->integer('is_require');
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
