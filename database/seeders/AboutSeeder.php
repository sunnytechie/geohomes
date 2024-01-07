<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //insert into About table
        DB::table('abouts')->insert([
                'video' => 'https://www.youtube.com/watch?v=JGwWNGJdvx8',
                'title' => 'We are a home of innovative solutions.',
                'description' => 'Frontier Building Infrastructure limited is a private limited liability company duly registered under the Companies and Allied Matters Act of 1990 on 12th August, 2020 with RC. No. 1696212.',
                'office_heading' => 'We are devoted to offering you properties that stand the test of time and market changes. ',
                'office_location' => '26 Moorehouse street Ogui Enugu.',
                'office_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.6468249970967!2d7.492525573327757!3d6.439381724138578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1044a3d8f51f6071%3A0x6b07f5ee68d7e660!2s26%20Moorehouse%20St%2C%20Ogui%20400001%2C%20Enugu!5e0!3m2!1sen!2sng!4v1685829579897!5m2!1sen!2sng',
        ]);
    }
}
