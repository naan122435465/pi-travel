<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'email'=>$this->faker->email(),
            'phone'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->address(),
            'evaluation'=> random_int(1,9),
            'coordinate'=>$this->faker->streetAddress(),
            'price'=> rand(100000,1000000),
            'location_id'=>Location::factory(),
            'description'=>$this->faker->realText(),

        ];
    }
}
