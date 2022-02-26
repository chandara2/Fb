<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'social_media',
        'social_media_link',
    ];
}
