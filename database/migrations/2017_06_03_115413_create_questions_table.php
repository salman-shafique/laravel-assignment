<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_tbl', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionair_id_fk')->unsigned();
            $table->string('question_type');
            $table->string('question');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('questionair_id_fk')->references('id')->on('questionaires_tbl')->onUpdate('cascade')->onDelete('cascade'); /*SET NULL*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions_tbl');
    }
}
