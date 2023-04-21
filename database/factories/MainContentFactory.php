<?php

namespace Database\Factories;


use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MainContent>
 */
class MainContentFactory extends Factory
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
            'description' => $this->faker->text(300),
            'user_id' => User::all()->random()->id
        ];
    }
}
