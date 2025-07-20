<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lecturer',
        'course_code',
        'code',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}