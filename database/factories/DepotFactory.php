<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Depot>
 */
class DepotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'location_id' => Location::pluck('id')->shuffle()->first(),
            'number_of_pallet' => random_int(5,100),
            'number_of_cage'=>random_int(5,100),
            'user_id' => 1
        ];
    }
}
