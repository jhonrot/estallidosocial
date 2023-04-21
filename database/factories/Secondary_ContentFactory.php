<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\MainContent;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Secondary_Content>
 */
class Secondary_ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->text(2000),
            'url' => $this->faker->url(),
            'font' => $this->faker->sentence(),
            'date' => $this->faker->date(),
            'content_tab' => $this->faker->url(),
            'category_id' => Category::all()->random()->id,
            'maincontent_id' => MainContent::all()->random()->id
        ];
    }
}
