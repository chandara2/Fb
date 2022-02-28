<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_img',
        'title_ch',
        'title_en',
        'title_kh',
        'title_th',
        'post_ch',
        'post_en',
        'post_kh',
        'post_th',
        'type',
    ];
}
