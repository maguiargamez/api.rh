<?php

namespace Database\Seeders;

use App\Models\Catalogos\CTipoOrganoAdministrativo;
use Illuminate\Database\Seeder;

class CTipoOrganoAdministrativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CTipoOrganoAdministrativo::insert([
            [
                'valor' => 'Gubernatura'
            ],
            [
                'valor' => 'Dependencias'
            ],
            [
                'valor' => 'Órganos Desconcentrados'
            ],
            [
                'valor' => 'Organismos Públicos Descentralizados Sectorizados'
            ],
            [
                'valor' => 'Organismos Públicos Descentralizados Desectorizados'
            ],
            [
                'valor' => 'Organismos Auxiliares del Ejecutivo'
            ],
            [
                'valor' => 'Empresas de Participación Estatal'
            ],
        ]);
    }
}
