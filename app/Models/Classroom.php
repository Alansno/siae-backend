<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Classroom extends Model
{
    use HasFactory;
    protected $table = "classroom";

    protected $fillable = [
        'calification',
        'status',
        'capacity',
        'student_id',
        'subject_id',
        'teacher_id'
    ];

    public function schedules(): BelongsToMany
    {
        return $this->belongsToMany(Schedule::class, 'classrooms_schedules');
    }
}
