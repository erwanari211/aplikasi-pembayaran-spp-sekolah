<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    protected $fillable = [
        'name', 'major',
    ];

    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }
}
