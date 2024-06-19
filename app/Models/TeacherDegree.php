<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherDegree extends Model
{
    use HasFactory;

    protected $table = "teachers_degrees";

    protected $fillable = [
        'teacher_id',
        'degree_id',
        'date_init',
        'date_end'
    ];
}
