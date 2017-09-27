<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->decimal('value', 6, 2);
            $table->char('type', 2);
            $table->date('date');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
	
	Schema::table('movements', function (Blueprint $table) {
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
        Schema::drop('movements');
    }
}
