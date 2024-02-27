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
            $table->string('response_question', 1);
            $table->string('status', 400);
            $table->integer('test_result_id')->unsigned();
            $table->integer('question_id')->unsigned();
            //relacion a la tabla question
            $table->foreign('question_id')
                ->references('question_id')
                ->on('questions');
            //relacion a la tabla test results players
            $table->foreign('test_result_id')
                ->references('test_result_id')
                ->on('test_result_players')->nullOnDelete();
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
        Schema::dropIfExists('answers');
    }
}
