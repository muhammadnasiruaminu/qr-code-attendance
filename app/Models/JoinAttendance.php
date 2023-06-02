<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JoinAttendance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'names',
        'registration_number',
        'create_attendances_uuid',
    ];

    public function createAttendance()
    {
        return $this->hasMany(CreateAttendance::class, 'uuid', 'create_attendances_uuid');
    }
}
