<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSalary extends Model
{
    use HasFactory;

    protected $fillable = [
        'salary_ch',
        'salary_en',
        'salary_kh',
        'salary_th',
    ];
}
