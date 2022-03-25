<?php

namespace Database\Seeders;

use App\Models\Catalogos\CEntidadFederativa;
use Illuminate\Database\Seeder;

class CEntidadFederativaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CEntidadFederativa::insert(
            [
            [
                'id_c_pais'=> 1,
                'clave'=> '01',
                'abrev'=> 'Ags.',
                'valor'=> 'Aguascalientes'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '02',
                'abrev'=> 'BC.',
                'valor'=> 'Baja California'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '03',
                'abrev'=> 'BCS.',
                'valor'=> 'Baja California Sur'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '04',
                'abrev'=> 'Camp.',
                'valor'=> 'Campeche'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '05',
                'abrev'=> 'Coah.',
                'valor'=> 'Coahuila de Zaragoza'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '06',
                'abrev'=> 'Col.',
                'valor'=> 'Colima'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '07',
                'abrev'=> 'Chis.',
                'valor'=> 'Chiapas'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '08',
                'abrev'=> 'Chih.',
                'valor'=> 'Chihuahua'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '09',
                'abrev'=> 'CDMX',
                'valor'=> 'Ciudad de México'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '10',
                'abrev'=> 'Dgo.',
                'valor'=> 'Durango'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '11',
                'abrev'=> 'Gto.',
                'valor'=> 'Guanajuato'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '12',
                'abrev'=> 'Gro.',
                'valor'=> 'Guerrero'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '13',
                'abrev'=> 'Hgo.',
                'valor'=> 'Hidalgo'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '14',
                'abrev'=> 'Jal.',
                'valor'=> 'Jalisco'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '15',
                'abrev'=> 'Mex.',
                'valor'=> 'México'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '16',
                'abrev'=> 'Mich.',
                'valor'=> 'Michoacán de Ocampo'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '17',
                'abrev'=> 'Mor.',
                'valor'=> 'Morelos'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '18',
                'abrev'=> 'Nay.',
                'valor'=> 'Nayarit'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '19',
                'abrev'=> 'NL',
                'valor'=> 'Nuevo León'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '20',
                'abrev'=> 'Oax.',
                'valor'=> 'Oaxaca'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '21',
                'abrev'=> 'Pue.',
                'valor'=> 'Puebla'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '22',
                'abrev'=> 'Qro.',
                'valor'=> 'Querétaro'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '23',
                'abrev'=> 'Q. Roo',
                'valor'=> 'Quintana Roo'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '24',
                'abrev'=> 'SLP',
                'valor'=> 'San Luis Potosí'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '25',
                'abrev'=> 'Sin.',
                'valor'=> 'Sinaloa'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '26',
                'abrev'=> 'Sin.',
                'valor'=> 'Sinaloa'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '27',
                'abrev'=> 'Tab.',
                'valor'=> 'Tabasco'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '28',
                'abrev'=> 'Tamps.',
                'valor'=> 'Tamaulipas'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '29',
                'abrev'=> 'Tlax.',
                'valor'=> 'Tlaxcala'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '30',
                'abrev'=> 'Ver.',
                'valor'=> 'Veracruz de Ignacio de la Llave'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '31',
                'abrev'=> 'Yuc.',
                'valor'=> 'Yucatán'
            ],
            [
                'id_c_pais'=> 1,
                'clave'=> '32',
                'abrev'=> 'Zac.',
                'valor'=> 'Zacatecas'
            ]
            ]
        );
    }
}
