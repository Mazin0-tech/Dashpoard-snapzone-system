<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text_1',
        'text_2',
        'description',
        'footer_about',
        'mission',
        'vision',
        'service_quote',
        'portfolio_quote',
        'blog_quote',
        'video_link',
        'projects_completed',
        'happy_customers',
        'years_of_experience',
        'award_achievement'
    ];
}