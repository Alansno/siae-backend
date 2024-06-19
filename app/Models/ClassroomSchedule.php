<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomSchedule extends Model
{
    use HasFactory;

    protected $table = "classroom_schedules";

    protected $fillable = [
        'classroom_id',
        'schedule_id'
    ];
}
