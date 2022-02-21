<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobIndustry extends Model
{
    use HasFactory;

    protected $fillable = [
        'industry_ch',
        'industry_en',
        'industry_kh',
        'industry_th',
    ];
}
