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
        'company_id',
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
        'salary_ch',
        'salary_en',
        'salary_kh',
        'salary_th',
        'sex',
        'term',
        'title_ch',
        'title_en',
        'title_kh',
        'title_th',
        'uid',
        'year_of_exp',
    ];

    // public function users()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
