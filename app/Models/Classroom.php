<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "classroom";

    protected $fillable = [
        'status',
        'capacity',
        'subject_id',
        'teacher_id'
    ];

    public function schedules(): BelongsToMany
    {
        return $this->belongsToMany(Schedule::class, 'classrooms_schedules');
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_classrooms');
    }
}
