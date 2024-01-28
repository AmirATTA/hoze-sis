<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Ybazli\Faker\Facades\Faker;
use Illuminate\Support\Facades\DB;

class AnnouncementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < rand(25,75); $i++) { 
            DB::table('announcements')->insert([
                'title' => Faker::word(10),
                'slug' => Str::slug(Faker::sentence(10)),
                'summary' => Faker::sentence(2),
                'body' => Faker::paragraph(25),
                'image' => rand(1,8) . '.jpg',
                'user_id' => 1,
                'views_count' => rand(0,1000),
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
