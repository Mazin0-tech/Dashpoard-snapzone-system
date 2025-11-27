<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'favicon',
        'logo',
        'dark_logo',
        'phone',
        'email',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'snapchat',
        'tiktok',
        'linkedin',
        'title',
        'address',
        'keywords',
        'meta',
    ];

}