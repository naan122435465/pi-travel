<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service_id'=>Service::factory(),
            'hotel_id'=>Hotel::factory(),
        ];
    }
}
