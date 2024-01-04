<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('answer_id');
            $table->string('answer_user', 1);
            $table->string('status', 400);
            $table->timestamps();

            $table->integer('user_id')->unsigned();
            //relacion a la tabla usuarios
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->integer('question_id')->unsigned();
            //relacion a la tabla question
            $table->foreign('question_id')
                ->references('question_id')
                ->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
