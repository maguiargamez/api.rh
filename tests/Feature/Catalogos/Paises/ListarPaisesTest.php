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
        //$this->withoutExceptionHandling();
        $pais = CPais::factory()->create();
        //$response= $this->getJson('/v1/catalogos/paises/'.$pais->getRouteKey());
        $response= $this->getJson(route('api.v1.c_paises.show', $pais->getRouteKey()));

        $response->assertJsonApiResource( $pais, [
            'clave' => $pais->clave,
            'valor' => $pais->valor,
            'nacionalidad' => $pais->nacionalidad,
            'activo' => $pais->activo
        ]);

    }

    /** @test */
    public function puede_obtener_todos_los_paises()
    {
        $this->withoutExceptionHandling();
        $paises = CPais::factory(3)->create();
        $response= $this->getJson(route('api.v1.c_paises.index'));

        $response->assertJsonApiResourceCollection($paises, [
            'clave', 'valor', 'nacionalidad', 'activo'
        ]);


    }
}
