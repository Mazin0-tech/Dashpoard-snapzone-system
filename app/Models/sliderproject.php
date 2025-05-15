<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sliderproject extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'project_id'
    ];


    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
