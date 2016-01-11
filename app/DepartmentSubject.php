<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentSubject extends Model
{
    protected $fillable = ['department_id', 'subject_id', 'group'];

    public function SetGroupAttribute($value)
    {
        $this->attributes['group'] = strtoupper($value);
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
