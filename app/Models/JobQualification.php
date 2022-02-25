<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobQualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'qualification_ch',
        'qualification_en',
        'qualification_kh',
        'qualification_th',
    ];
}