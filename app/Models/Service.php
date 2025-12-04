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
        'start_date',
        'end_date',
        'image',
        'small_image',
        'industry'
    ];


    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
}