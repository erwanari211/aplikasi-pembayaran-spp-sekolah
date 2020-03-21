<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSpp extends Model
{
    protected $fillable = [
        'year', 'amount',
    ];

    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }
}
