<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grade;
class Gradesubject extends Model
{
    protected $fillable=['subjectname','fullmarks','theorymarks','passmarks'];
    protected $table='gradesubjects';
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
