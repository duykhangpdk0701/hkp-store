<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ItemCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->name();
        return [
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'description' => $this->faker->sentence()
        ];
    }
}
