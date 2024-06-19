<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    protected $table = "inscriptions";

    protected $fillable = [
        'date_inscription',
        'student_id',
        'semester_id'
    ];
}
