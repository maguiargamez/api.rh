<?php

namespace Database\Seeders;

use App\Models\Catalogos\CRelacionLaboral;
use Illuminate\Database\Seeder;

class CRelacionLaboralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CRelacionLaboral::insert([
            [
                'valor' => 'BASE'
            ],
            [
                'valor' => 'CONFIANZA'
            ],
            [
                'valor' => 'CONTRATO'
            ],
        ]);
    }
}
