<?php

namespace Tests\Feature\Catalogos\Paises;

use App\Models\Catalogos\CPais;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListarPaisesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_buscar_un_solo_pais()
    {
        $this->withoutExceptionHandling();
        $pais = CPais::factory()->create();
        $response= $this->getJson('/v1/catalogos/paises/'.$pais->getRouteKey());
        $response->assertSee($pais->valor);
    }
}
