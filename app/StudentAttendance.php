<?php

namespace App;
use App\Grade;
use App\Section;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    public function grades()
    {
        return $this->belongsTo(Grade::class);
    }
    public function sections()
    {
        return $this->belongsTo(Section::class);
    }
}
