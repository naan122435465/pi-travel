<?php

namespace Database\Seeders;

use App\Models\HotelService;
use Illuminate\Database\Seeder;

class HotelServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HotelService::factory()->count(10)->create();
    }
}
