<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\MainContent;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('movilizaciones');
        Storage::makeDirectory('movilizaciones');

        $this->call(UserSeeder::class);
        Category::factory(8)->create();
        MainContent::factory(5)->create();
        $this->call(Secondary_ContentSeeder::class);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
