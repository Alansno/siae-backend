<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_birth',
        'teacher_phone',
        'teacher_address',
        'status',
        'image'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function degrees(): BelongsToMany
    {
        return $this->belongsToMany(Degree::class, 'teachers_degrees');
    }

    public function studies(): HasMany
    {
        return $this->hasMany(Study::class, 'teacher_id');
    }

    public function subjects(): BelongsToMany{
        return $this->belongsToMany(Subject::class, 'teacher_subjects');
    }
}
