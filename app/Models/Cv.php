<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'uid',
        'photo',
        'position_apply',
        'expected_salary',
        'kname',
        'ename',
        'nname',
        'house_no',
        'streat_no',
        'group_no',
        'village',
        'commune',
        'district',
        'province',
        'country',
        'dob',
        'sex',
        'email',
        'kphone',
        'tphone',
        'country_code',
        'passport',
        'id_card',
        'height',
        'weight',
        'nationality',
        'marital_status',
        'education_background',
        'employment_history',
        'language',
        'family',
        'computer',
        'emergency',
        'relationship',
    ];
}
