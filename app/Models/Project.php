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
        'slider_type',
        'model_link'
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

public function isPortrait()
{
    return $this->slider_type == 1 || $this->slider_type === '1';
}

public function isLandscape()
{
    return $this->slider_type == 0 || $this->slider_type === '0';
}
}