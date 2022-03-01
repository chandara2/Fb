<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'company',
        'logo',
        'industry',
        'number_staff',
        'website',
        'company_profile',
        'province',
        'detail_location',
        'contact_name',
        'contact_position',
        'contact_email',
        'contact_phone',
        'recruitment',
    ];

}
