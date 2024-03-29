<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    use HasFactory;

    protected $guard = 'student';

    
    protected $fillable = [
        'uuid',
        'names',
        'email',
        'password',
        'registration_number',
        'is_staff',
        'is_verified'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the CourseOfStudy that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function courseOfStudy()
    // {
    //     return $this->belongsTo(CourseOfStudy::class, 'course_of_study_uuid', 'uuid');
    // }
}
