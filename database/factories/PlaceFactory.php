<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name= Str::title($this->faker->sentence());
        $slug = Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'detail' => '<p>'.$this->faker->text(200).'</p>
                        <p>'.$this->faker->text(200).'</p>',
        ];
    }
}
