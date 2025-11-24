<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'industry',
        'date',
        'service_id',
        'client',
        'link_project',
        'slider_type'
    ];

    protected $casts = [
        'date' => 'date',
        'slider_type' => 'boolean'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function isLandscape()
    {
        return $this->slider_type === 0;
    }

    public function isPortrait()
    {
        return $this->slider_type === 1;
    }
}