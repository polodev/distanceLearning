<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['subject_name','subject_description', 'subject_credit'];

    public function setSubjectNameAttribute($value)
    {
        $this->attributes['subject_name'] = ucfirst($value);
    }
    public function department_subjects()
    {
        return $this->hasMany('App/DepartmentSubject');
    }
}
