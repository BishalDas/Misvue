<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academicinfo extends Model
{
    protected $fillable= ['student_id','registration_number','academic_year','grade_id','section_id','roll_no'];
    protected $table='academicinfos';
}
