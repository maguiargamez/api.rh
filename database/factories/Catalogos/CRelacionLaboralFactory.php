<?php

namespace Database\Factories\Catalogos;

use Illuminate\Database\Eloquent\Factories\Factory;

class CRelacionLaboralFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'valor' => $this->faker->word(),
            'activo' => 1
        ];
    }
}
