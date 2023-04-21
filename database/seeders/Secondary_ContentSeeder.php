<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Secondary_Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Secondary_ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $secondaris = Secondary_Content::factory(100)->create();

        foreach ($secondaris as $secondary) {
            Image::factory(1)->create([
                'imageable_id'  => $secondary->id,
                'imageable_type' => Secondary_Content::class
            ]);
        }
    }
}
