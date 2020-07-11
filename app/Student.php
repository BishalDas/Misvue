<?php

namespace App;
use App\Role;
use App\Grade;
use App\Section;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name','email','password','type','gender','role_id',
    'guardian_name','guardian_email','date_of_birth','address','contact','image',
    'date_of_admission','grade_id','section_id'];
    protected $table='students';
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
