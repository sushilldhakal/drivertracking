<?php

namespace Database\Factories;

use App\Models\Supplier;
use App\Models\TruckType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->address(),
            'address' => $this->faker->address(),
            'user_id' => User::first()->id,
            'truck_type_id' => TruckType::pluck('id')->shuffle()->first(),
            'supplier_id' => Supplier::pluck('id')->shuffle()->first(),
        ];
    }
}
