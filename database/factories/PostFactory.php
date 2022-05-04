<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = Str::title($this->faker->sentence());
        $slug = Str::slug($title);
        return [
            'title' => $title,
            'slug' => $slug,
            'content' => '<p>'.$this->faker->text(200).'</p>
                        <p>'.$this->faker->text(200).'</p>
                        <p>'.$this->faker->text(200).'</p>',
        ];
    }
}
