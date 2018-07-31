<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b4d4a70f2292RelationshipsToCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function(Blueprint $table) {
            if (!Schema::hasColumn('courses', 'teachers_id')) {
                $table->integer('teachers_id')->unsigned()->nullable();
                $table->foreign('teachers_id', '185178_5b4d4a709a408')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('courses', function(Blueprint $table) {
            
        });
    }
}
