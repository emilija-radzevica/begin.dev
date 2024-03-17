<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Character;
use App\Models\Culture;
use App\Models\Item;
use App\Models\Listing;
use App\Models\Location;
use App\Models\Post;
use App\Models\Specie;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Listing::create([
        //     'name' => 'Prue',
        //     'tags' => 'charmed, urban fantasy',
        //     'summary' => 'Eldest sister'
        // ]);
        // Listing::create([
        //     'name' => 'Paige',
        //     'tags' => 'charmed, urban fantasy',
        //     'summary' => 'Youngest sister'
        // ]);

        $user = User::factory()->create([
            'name' => 'John Doe',
            'username' => 'johnny89',
            'email' => 'john@inbox.lv'
        ]);

        
        Post::factory(10)->create([
            'user_id'=>$user->id
        ]);
        
        Character::factory(8)->create();
        Location::factory(10)->create();
        Item::factory(10)->create();
        Culture::factory(10)->create();
        Specie::factory(10)->create();
    }
}
