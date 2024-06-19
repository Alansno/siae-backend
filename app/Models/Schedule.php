<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_class_init',
        'date_class_end'
    ];

    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class, 'classrooms_schedules');
    }
}
