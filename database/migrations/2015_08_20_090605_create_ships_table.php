<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('owner_first');
            $table->string('owner_last');
            $table->string('owner_email');
            $table->string('owner_phonenumber');
            $table->integer('strippen_total');
            $table->integer('bridges_total');
            $table->timestamps();
        });

        Schema::create('ship_user', function(Blueprint $table){
            $table->integer('ship_id')->unsigned()->index();
            $table->foreign('ship_id')->references('id')->on('ships')->onDelete('cascade');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::drop('ships');
        Schema::drop('ship_user');
    }
}
