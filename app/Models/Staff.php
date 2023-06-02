<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    
    protected $guard = 'staff';

    protected $fillable = [
        'uuid',
        'full_name',
        'psn',
        'email',
        'phone_number',
        'department_uuid',
        'password'
    ];
}
