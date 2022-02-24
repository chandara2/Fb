<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTerm extends Model
{
    use HasFactory;

    protected $fillable = [
        'term_ch',
        'term_en',
        'term_kh',
        'term_th',
    ];
}
