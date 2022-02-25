<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner',
        'aboutus_ch',
        'aboutus_en',
        'aboutus_kh',
        'aboutus_th',
    ];
}
