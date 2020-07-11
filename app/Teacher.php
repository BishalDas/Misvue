<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable=['name','email'];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
