<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'institution',
        'course',
        'start',
        'end',
        'certificate',
        
    ];
}
