<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerOrder>
 */
class CustomerOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cas' => fake()->date(),
            'orderNum' => (fake()->numberBetween(21000,24000)*100),
            'oznaceni' => fake()->name(),
            'idKontakt' => fake()->unique->numberBetween(1,50),
            'prenosDPH' => fake()->boolean(),
            'typ'   => 10,
            'druh'  => fake()->numberBetween(1,29),
            'user'  => fake()->numberBetween(1,9),
            'provozovna' => fake()->numberBetween(1,9),
            'klient' => fake()->numberBetween(1,9),
            'developer' =>fake()->numberBetween(1,29),
            'pokladna'  => fake()->boolean(),
            'smlouva'  => fake()->boolean(),
            'objednavky' => fake()->boolean(),
            'platbyRank'  => fake()->numberBetween(0,100),
            'ukonceno'  => fake()->date(),
            'archiv' => fake()->date(),
            'zisk'   => fake()->numberBetween(0,100),           
        ];
    }
}
