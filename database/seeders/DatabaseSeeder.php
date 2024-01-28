<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\LinksTableSeeder;
use Database\Seeders\SlidersTableSeeder;
use Database\Seeders\ArticlesTableSeeder;
use Database\Seeders\SettingsTableSeeder;
use Database\Seeders\MenuItemsTableSeeder;
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\AnnouncementsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SettingsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(AnnouncementsTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(LinksTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
    }
}
