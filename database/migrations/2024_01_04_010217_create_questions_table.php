<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('question_id');
            $table->string('name', 600);
            $table->mediumText('question_a');
            $table->mediumText('question_b');
            $table->mediumText('question_c');
            $table->string('answer_correct', 1);
            $table->timestamps();

            $table->integer('test_id')->unsigned();
            //relacion a la tabla tests
            $table->foreign('test_id')
                ->references('test_id')
                ->on('tests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
