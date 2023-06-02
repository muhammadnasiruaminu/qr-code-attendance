<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'course_uuid',
        'starts_at',
        'ends_at',
        'token'
    ];

    public function curriculum()
    {
        // return $this->hasMany(Curriculum::class, 'uuid', 'course_uuid');
        return $this->hasOne(Curriculum::class, 'uuid', 'course_uuid');
    }

    public function joinAttendance()
    {
        return $this->belongsTo(JoinAttendance::class, 'uuid', 'create_attendances_uuid');
    }
}
