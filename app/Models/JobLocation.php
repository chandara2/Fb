<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_ch',
        'location_en',
        'location_kh',
        'location_th',
    ];
}
