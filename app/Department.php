<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['department_name', 'department_credit', 'degree_id'];

    public function degree()
    {
        return $this->belongsTo('App\Degree');
    }

    public function department_subjects()
    {
        return $this->hasMany('App/DepartmentSubject');
    }

    public function getDepartmentNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setDepartmentNameAttribute($value)
    {
        $this->attributes['department_name'] = ucfirst($value);
    }
}
