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
     'gallery',

    ];


public function services(){
    return $this->belongsTo(Service::class  , 'service_id');
}

    public function sliders()
    {
        return $this->hasMany(Sliderservices::class, 'project_id');
    }


    public function sliderProjects()
    {
        return $this->hasMany(sliderproject::class);
    }

}
