<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Ybazli\Faker\Facades\Faker;
use Illuminate\Support\Facades\DB;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = 0;
        for ($i=0; $i < 20; $i++) { 
            if($i <= 9) {
                DB::table('menu_items')->insert([
                    'menu_group_id' => 1,
                    'title' => Faker::fullName(),
                    'linkable_type' => null,
                    'linkable_id' => null,
                    'link' => 'www.facebook.com',
                    'order' => $order,
                    'new_tab' => rand(0,1),
                    'status' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $order++;
            } else {
                DB::table('menu_items')->insert([
                    'menu_group_id' => 2,
                    'title' => Faker::lastName(),
                    'linkable_type' => null,
                    'linkable_id' => null,
                    'link' => 'www.facebook.com',
                    'order' => $order,
                    'new_tab' => rand(0,1),
                    'status' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $order++;
            }
        }
    }
}
