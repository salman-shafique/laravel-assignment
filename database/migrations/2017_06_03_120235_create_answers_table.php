<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers_tbl', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id_fk')->unsigned();
            $table->string('answers');
            $table->string('answers_status');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('question_id_fk')->references('id')->on('questions_tbl')->onUpdate('cascade')->onDelete('cascade'); /*SET NULL*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answers_tbl');
    }
}
