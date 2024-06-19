<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_birth',
        'phone_student',
        'address_student',
        'status',
        'image'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function degrees(): BelongsToMany
    {
        return $this->belongsToMany(Degree::class, 'students_degrees');
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'classroom');
    }

    public function semesters(): BelongsToMany
    {
        return $this->belongsToMany(Semester::class, 'inscriptions');
    }
}
