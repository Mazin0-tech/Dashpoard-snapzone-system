<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliderservices extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'service_id',
        'project_id'
    ];


    // start  create Realations 

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    
}
