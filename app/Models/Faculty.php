<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'faculty_name',
        'faculty_initial',
    ];

    public function department()
    {
        return $this->hasMany(department::class); // , 'faculty_id', 'id'
    }
}
