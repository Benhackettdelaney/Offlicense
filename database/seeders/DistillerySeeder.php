<?php

namespace Database\Seeders;

use App\Models\Distillery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistillerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Distillery::factory()
        ->times(4)
        ->hasDrinks(20)
        ->create();
    }
}
