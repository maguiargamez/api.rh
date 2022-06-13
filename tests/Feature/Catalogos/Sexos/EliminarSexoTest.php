<?php

namespace Tests\Feature\Catalogos\Sexos;

use App\Models\Catalogos\CSexo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EliminarSexoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_eliminar_sexo()
    {
        $sexo = CSexo::factory()->create();

        $this->deleteJson(route('api.v1.catalogos.sexos.destroy', $sexo))
            ->assertNoContent();

        //$this->assertDatabaseCount('c_paises', 0);
    }
}
