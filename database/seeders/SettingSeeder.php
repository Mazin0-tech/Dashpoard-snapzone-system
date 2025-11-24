<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'site_name' => 'SnapZone',
                'favicon' => 'favicon.ico',
                'logo' => 'logo.png',
                'phone' => '+201234567890',
                'email' => 'info@snapzone.com',
                'facebook' => 'https://facebook.com/snapzone',
                'twitter' => 'https://twitter.com/snapzone',
                'instagram' => 'https://instagram.com/snapzone',
                'youtube' => 'https://youtube.com/snapzone',
                'snapchat' => 'https://snapchat.com/add/snapzone',
                'tiktok' => 'https://tiktok.com/@snapzone',
                'linkedin' => 'https://linkedin.com/company/snapzone',
                'title' => 'SnapZone - Creative Digital Solutions',
                'address' => 'Cairo, Egypt',
                'keywords' => 'web design, app development, programming, graphic design, digital marketing, social media',
                'meta' => 'SnapZone - Professional digital solutions company specializing in web design, mobile apps, and digital marketing',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}