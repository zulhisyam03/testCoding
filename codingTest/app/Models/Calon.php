<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'education',
        'birthday',
        'experience',
        'lastPosition',
        'appliedPosition',
        'top5',
        'email',
        'phone',
        'resume'
    ];
}
