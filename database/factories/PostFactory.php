<?php

namespace Database\Factories;

use App\Models\Hotel;
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
        return [
            'hotel_id'=>Hotel::factory(),
            'type'=>$this->faker->domainName(),
            'name'=>$this->faker->name(),
            'content'=>$this->faker->realText(),

        ];
    }
}
