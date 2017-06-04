<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionaires_tbl', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id_fk')->unsigned();
            $table->string('name');
            $table->integer('duration');
            $table->string('time');
            $table->boolean('resumeable');
            $table->boolean('publish');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('user_id_fk')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade'); /*SET NULL*/


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questionaires_tbl');
    }
}
