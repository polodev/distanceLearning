<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $fillable = ['degree_name'];

    public function departments()
    {
        return $this->hasMany('App\Department');
    }

    public function getDegreeNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setDegreeNameAttribute($value)
    {
        $this->attributes['degree_name'] = ucfirst($value);
    }
}
