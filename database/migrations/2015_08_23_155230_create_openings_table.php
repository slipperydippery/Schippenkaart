<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ship_id')->unsigned();
            $table->string('ship_name');
            $table->integer('bridge_id')->unsigned();
            $table->string('bridge_name');
            $table->integer('user_id')->unsigned();
            $table->string('user_name');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('ship_id')
                  ->references('id')
                  ->on('ships')
                  ->onDelete('cascade');
            $table->foreign('bridge_id')
                  ->references('id')
                  ->on('bridges')
                  ->onDelete('cascade');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('openings');
    }
}
