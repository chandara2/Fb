<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'age',
        'contact',
        'deadline',
        'detail',
        'hiring',
        'industry',
        'job_function',
        'job_title',
        'language',
        'location',
        'qualification',
        'salary',
        'sex',
        'term',
        'year_of_exp',
        'visible',
    ];
}
