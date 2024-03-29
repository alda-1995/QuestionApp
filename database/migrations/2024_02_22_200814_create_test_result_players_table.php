<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestResultPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_result_players', function (Blueprint $table) {
            $table->increments('test_result_id');
            $table->string('status', 400);
            $table->timestamps();

            $table->integer('user_id')->unsigned();
            //relacion a la tabla usuarios
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->integer('test_id')->unsigned();
            //relacion a la tabla tests
            $table->foreign('test_id')
                ->references('test_id')
                ->on('tests')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_result_players');
    }
}
