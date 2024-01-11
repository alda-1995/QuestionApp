<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('test_id');
            $table->string('name', 600);
            $table->mediumText('description');
            $table->mediumText('message_success');
            $table->mediumText('message_fail');
            $table->string('status', 500)->default('proceso');
            $table->timestamps();

            $table->integer('user_id')->unsigned();
            //relacion a la tabla usuarios
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
