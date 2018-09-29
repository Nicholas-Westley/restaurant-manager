<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SwapPivotTableName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('restaurant_id');
            $table->integer('user_id');
            $table->timestamps();
        });
        Schema::drop('user_restaurant');
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
