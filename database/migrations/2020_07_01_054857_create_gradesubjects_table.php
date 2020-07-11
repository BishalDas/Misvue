<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradesubjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('grade_id');
            $table->string('subjectname');
            $table->float('fullmarks');
            $table->float('theorymarks');
            $table->float('practicalmarks');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('gradesubjects');
    }
}
