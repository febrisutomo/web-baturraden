<?php

namespace Database\Seeders;

use App\Models\Place;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Place::factory()->count(6)->create();
        Post::factory()->count(10)->create();
        // \App\Models\User::factory(10)->create();
    }
}
