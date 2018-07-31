<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b4d4f2194ca4QuestionTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('question_test')) {
            Schema::create('question_test', function (Blueprint $table) {
                $table->integer('question_id')->unsigned()->nullable();
                $table->foreign('question_id', 'fk_p_185188_185190_test_q_5b4d4f2194d9e')->references('id')->on('questions')->onDelete('cascade');
                $table->integer('test_id')->unsigned()->nullable();
                $table->foreign('test_id', 'fk_p_185190_185188_questi_5b4d4f2194e5d')->references('id')->on('tests')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_test');
    }
}
