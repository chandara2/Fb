<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'age',
        'approved',
        'contact',
        'detail',
        'expired_job',
        'expired_post',
        'function',
        'hiring',
        'industry',
        'language',
        'location',
        'qualification',
        'salary',
        'sex',
        'term',
        'title',
        'uid',
        'year_of_exp',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
