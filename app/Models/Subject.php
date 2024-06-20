<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'credits'
    ];

    public function degrees(): BelongsToMany
    {
        return $this->belongsToMany(Degree::class, 'degree_subjects');
    }

    public function teachers(): BelongsToMany{
        return $this->belongsToMany(Teacher::class, 'classroom');
    }
}
