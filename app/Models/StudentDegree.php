<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDegree extends Model
{
    use HasFactory;

    protected $table = "students_degrees";

    protected $fillable = [
        'student_id',
        'degree_id',
        'semester_id',
        'group_id',
        'date_init',
        'date_end'
    ];
}
