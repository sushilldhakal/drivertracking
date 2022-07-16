<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(3)->create();
        \App\Models\TruckType::factory(3)->create();
        \App\Models\Supplier::factory(3)->create();
        \App\Models\Location::factory(3)->create();
        \App\Models\Depot::factory(3)->create();
    }
}
