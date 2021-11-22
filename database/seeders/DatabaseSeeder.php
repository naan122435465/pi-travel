<?php

namespace Database\Seeders;

use App\Models\HotelService;
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
        //\App\Models\User::factory(10)->create();
        $this->call([
            LocationSeeder::class,
            RoomSeeder::class,
            ServiceSeeder::class,
            HotelSeeder::class,
            PostSeeder::class,
            RoleSeeder::class,
            RoomTypeSeeder::class,
            UserSeeder::class,
            HotelServiceSeeder::class,
        ]);
    }
}
