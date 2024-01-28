<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Ybazli\Faker\Facades\Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < rand(25,75); $i++) { 
            DB::table('news')->insert([
                'featured' => rand(0,1),
                'title' => Faker::word(10),
                'subtitle' => Faker::sentence(4),
                'slug' => Str::slug(Faker::sentence(10)),
                'summary' => Faker::sentence(2),
                'body' => Faker::paragraph(25),
                'image' => rand(1,8) . '.jpg',
                'resource_label' => Faker::sentence(1),
                'resource_url' => 'www.youtube.com',
                'category_id' => rand(1,5),
                'user_id' => 1,
                'views_count' => rand(0,1000),
                'status' => 1,
                'published_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
