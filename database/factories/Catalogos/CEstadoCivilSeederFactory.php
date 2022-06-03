<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CEstadoCivilSeederFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $state = $this->faker->state();

        return [
            'clave' => $this->faker->randomLetter(),
            'valor' => $this->faker->word(),
            'activo' => 1
        ];
    }
}
