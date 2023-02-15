<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'uuid',
        'full_name',
        'reg_number',
        'email',
        'phone_number',
        'level',
        // 'course_of_study'
        'course_of_study_uuid'
    ];

    /**
     * Get the CourseOfStudy that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courseOfStudy()
    {
        return $this->belongsTo(CourseOfStudy::class, 'course_of_study_uuid', 'uuid');
    }
}
