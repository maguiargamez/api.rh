<?php

namespace Database\Factories\Catalogos;

use App\Models\Catalogos\CPais;
use Illuminate\Database\Eloquent\Factories\Factory;

class CPaisFactory extends Factory
{
    protected $model = CPais::class;

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
            'nacionalidad' => $state,
            'activo' => true
        ];
    }
}
