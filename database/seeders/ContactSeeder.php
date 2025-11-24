<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'email2' => 'john.backup@example.com',
                'email3' => null,
                'phone' => '+201234567890',
                'phone2' => '+201098765432',
                'phone3' => null,
                'subject' => 'Website Development Inquiry',
                'message' => 'I am interested in your website development services. Please contact me with more information.',
                'address' => '123 Main Street, Cairo, Egypt',
                'iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110502.603895251!2d31.32849492080026!3d30.059618470412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2sCairo%2C%20Cairo%20Governorate%2C%20Egypt!5e0!3m2!1sen!2seg!4v1234567890" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
