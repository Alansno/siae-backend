<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Degree extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_degree',
        'date_validate_init',
        'date_validate_end'
    ];

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'teachers_degrees');
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'students_degrees');
    }
}
