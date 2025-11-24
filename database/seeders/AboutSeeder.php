<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        About::create([
            'title' => 'About Our Company',
            'text_1' => 'First section text...',
            'text_2' => 'Second section text...',
            'description' => 'Company description...',
            'footer_about' => 'Footer about text...',
            'mission' => 'Our mission statement...',
            'vision' => 'Our vision statement...',
            'service_quote' => 'Quote about services...',
            'portfolio_quote' => 'Quote about portfolio...',
            'blog_quote' => 'Quote about blog...',
            'video_link' => 'https://youtube.com/embed/example',
            'projects_completed' => 150,
            'happy_customers' => 200,
            'years_of_experience' => 5,
            'award_achievement' => 10,
        ]);
    }
}