<?php

namespace Tests\Feature\Catalogos\Paises;

use App\Models\Catalogos\CPais;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EliminarPaisTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_eliminar_pais()
    {
        $pais = CPais::factory()->create();

        $this->deleteJson(route('api.v1.c_paises.destroy', $pais))
            ->assertNoContent();

        //$this->assertDatabaseCount('c_paises', 0);
    }
}
