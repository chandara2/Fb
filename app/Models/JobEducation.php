<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'education_ch',
        'education_en',
        'education_kh',
        'education_th',
    ];
}
