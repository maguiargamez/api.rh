<?php

namespace Database\Seeders;

use App\Models\Catalogos\CPais;
use Illuminate\Database\Seeder;
use Database\Seeders\CPaisSeeder;
use Database\Seeders\CEntidadFederativaSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CPaisSeeder::class);
        $this->call(CEntidadFederativaSeeder::class);
        $this->call(CSexoSeeder::class);
        $this->call(CEstadoCivilSeeder::class);
        $this->call(CRegimenMatrimonialSeeder::class);
        $this->call(CRelacionLaboralSeeder::class);
        //CPais::factory(3)->create();
    }
}
