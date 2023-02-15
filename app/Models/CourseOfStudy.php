<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseOfStudy extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'department_uuid',
        'course_of_study',
        'duration'
    ];

    public function student()
    {
        return $this->hasMany(Student::class, 'course_of_study', 'uuid');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_uuid', 'uuid');
    }
}
