<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 'student_id', 'student_spp_id',
        'paid_at', 'year', 'month', 'status', 'amount',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function studentSpp()
    {
        return $this->belongsTo('App\Models\StudentSpp');
    }
}
