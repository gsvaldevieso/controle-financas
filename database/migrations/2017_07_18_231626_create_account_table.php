<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('bank');
            $table->string('owner');            
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

	Schema::table('accounts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accounts');
    }
}
