<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'department_name',
        'department_initial',
        'faculty',
    ];

    public function courseOfStudy()
    {
        return $this->hasMany(CourseOfStudy::class, 'department_uuid', 'uuid');
    }
}
