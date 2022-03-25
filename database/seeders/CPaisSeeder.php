<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogos\CPais;
class CPaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CPais::create([
            'clave'=> 'MX',
            'valor'=> 'México',
            'nacionalidad'=> 'Mexicana',
        ]);
    }
}
