<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DegreeSubject extends Model
{
    use HasFactory;
    protected $table = "degree_subjects";

    protected $fillable = [
        'degree_id',
        'subject_id'
    ];
}
