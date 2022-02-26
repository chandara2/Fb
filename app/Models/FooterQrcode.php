<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterQrcode extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_title',
        'qrcode',
        'qrcode_link',
    ];
}
