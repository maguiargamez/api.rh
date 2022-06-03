<?php

namespace Database\Seeders;

use App\Models\Catalogos\CEstadoCivil;
use Illuminate\Database\Seeder;

class CEstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CEstadoCivil::insert([
            [
                'clave' => 'SOL',
                'valor' => 'SOLTERO(A)'
            ],
            [
                'clave' => 'CAS',
                'valor' => 'CASADO(A)'
            ],
            [
                'clave' => 'DIV',
                'valor' => 'DIVORCIADO(A)'
            ],
            [
                'clave' => 'VIU',
                'valor' => 'VIUDO(A)'
            ],
            [
                'clave' => 'CON',
                'valor' => 'CONCUBINA/CONCUBINARIO/UNIÓN LIBRE'
            ],
            [
                'clave' => 'SCO',
                'valor' => 'SOCIEDAD DE CONVIVENCIA'
            ],
        ]);
    }
}
