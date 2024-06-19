<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester'
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'inscriptions');
    }
}
