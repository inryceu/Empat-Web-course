<?php

namespace Database\Seeders;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Game;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::factory(10)->create();

        Publisher::factory(5)->create()->each(function ($publisher) use ($categories) {

            $games = Game::factory(rand(3, 7))->create([
                'publisher_id' => $publisher->id
            ]);

            foreach ($games as $game) {
                $game->categories()->attach(
                    $categories->random(rand(1, 3))->pluck('id')->toArray()
                );
            }
        });
    }
}
