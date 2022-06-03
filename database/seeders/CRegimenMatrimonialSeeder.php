<?php

namespace Database\Seeders;

use App\Models\Catalogos\CRegimenMatrimonial;
use Illuminate\Database\Seeder;

class CRegimenMatrimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CRegimenMatrimonial::insert([
            [
                'clave' => 'SOC',
                'valor' => 'SOCIEDAD CONYUGAL'
            ],
            [
                'clave' => 'SBI',
                'valor' => 'SEPARACIÓN DE BIENES'
            ],
            [
                'clave' => 'OTR',
                'valor' => 'OTRO'
            ],
        ]);
    }
}
