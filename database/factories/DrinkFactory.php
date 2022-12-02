<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// this is where you fill the information on the database 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Drink>
 */
class DrinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'price' => 12.50,
            'quantity' =>$this->faker->numberBetween(0, 1000000),
            'alcohol_level' => $this->faker->numberBetween(0, 100),
            // 'distillery_id' => 1
            // 'drink_image' => "book_placeholder.jpg",
            
        ];
    }
}

// the tables will be filled with the information specified with the code above