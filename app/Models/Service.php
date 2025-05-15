<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'shortdescription',
        'description',
        'image',
        'industry',
    ];




    public function project()
    {
        return $this->hasMany(Project::class);
    }

    public function sliders()
    {
        return $this->hasMany(Sliderservices::class, 'service_id');
    }
}
