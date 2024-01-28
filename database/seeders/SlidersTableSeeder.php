<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Ybazli\Faker\Facades\Faker;
use Illuminate\Support\Facades\DB;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < rand(25,75); $i++) { 
            DB::table('sliders')->insert([
                'title' => Faker::word(10),
                'summary' => Faker::sentence(2),
                'link' => 'www.facebook.com',
                'image' => rand(1,8) . '.jpg',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
