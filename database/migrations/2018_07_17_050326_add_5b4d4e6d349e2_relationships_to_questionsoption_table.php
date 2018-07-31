<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b4d4e6d349e2RelationshipsToQuestionsOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions_options', function(Blueprint $table) {
            if (!Schema::hasColumn('questions_options', 'question_id')) {
                $table->integer('question_id')->unsigned()->nullable();
                $table->foreign('question_id', '185189_5b4d4e6ceee68')->references('id')->on('questions')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions_options', function(Blueprint $table) {
            
        });
    }
}
