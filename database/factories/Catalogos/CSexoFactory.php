<?php

namespace Database\Factories\Catalogos;


use App\Models\Catalogos\CSexo;
use Illuminate\Database\Eloquent\Factories\Factory;

class CSexoFactory extends Factory
{
    protected $model = CSexo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $state = $this->faker->state();

        return [
            'clave' => $this->faker->stateAbbr(),
            'valor' => $state,
            'activo' => 1
        ];
    }
}
