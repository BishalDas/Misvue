<?php

namespace App;
use App\Grade;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable=['name','description'];
    protected $table='sections';
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
