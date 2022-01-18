<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
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

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
