<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id', 'student_class_id', 'student_spp_id', 'code', 'phone', 'address',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function studentClass()
    {
        return $this->belongsTo('App\Models\StudentClass');
    }

    public function studentSpp()
    {
        return $this->belongsTo('App\Models\StudentSpp');
    }
}
