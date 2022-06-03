<?php

namespace Database\Seeders;

use App\Models\Catalogos\CSexo;
use Illuminate\Database\Seeder;

class CSexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CSexo::insert([
            [
                'clave' => 'H',
                'valor' => 'Hombre'
            ],
            [
                'clave' => 'M',
                'valor' => 'Mujer'
            ]
        ]);
    }
}
