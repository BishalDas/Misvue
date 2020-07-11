<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academicinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id');            
            $table->string('registration_number'); 
            $table->integer('academic_year');
            $table->integer('grade_id');
            $table->integer('section_id');             
            $table->integer('roll_no');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('academicinfos');
    }
}
