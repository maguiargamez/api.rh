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
        //$response= $this->getJson('/v1/catalogos/paises/'.$pais->getRouteKey());
        $response= $this->getJson(route('api.v1.catalogos.paises.show', $pais->getRouteKey()));
        $response->assertJson([
            'data' => [
                'type' => 'c_paises',
                'id' => $pais->getRouteKey(),
                'attributes' => [
                    'clave' => $pais->clave,
                    'valor' => $pais->valor,
                    'nacionalidad' => $pais->nacionalidad,
                    'activo' => $pais->activo,
                ],
                'links' => [
                    'self' => route('api.v1.catalogos.paises.show', $pais->getRouteKey())
                ]
            ]
        ]);
    }

    /** @test */
    public function puede_obtener_todos_los_paises()
    {
        $this->withoutExceptionHandling();
        $paises = CPais::factory(3)->create();
        $response= $this->getJson(route('api.v1.catalogos.paises.index'));
        $response->assertJson([
            'data' => [
                [
                    'type' => 'c_paises',
                    'id' => (string) $paises[0]->getRouteKey(),
                    'attributes' => [
                        'clave' => $paises[0]->clave,
                        'valor' => $paises[0]->valor,
                        'nacionalidad' => $paises[0]->nacionalidad,
                        'activo' => $paises[0]->activo,
                    ],
                    'links' => [
                        'self' => route('api.v1.catalogos.paises.show', $paises[0]->getRouteKey())
                    ]
                ],
                [
                    'type' => 'c_paises',
                    'id' => (string) $paises[1]->getRouteKey(),
                    'attributes' => [
                        'clave' => $paises[1]->clave,
                        'valor' => $paises[1]->valor,
                        'nacionalidad' => $paises[1]->nacionalidad,
                        'activo' => $paises[1]->activo,
                    ],
                    'links' => [
                        'self' => route('api.v1.catalogos.paises.show', $paises[1]->getRouteKey())
                    ]
                ],
                [
                    'type' => 'c_paises',
                    'id' => (string) $paises[2]->getRouteKey(),
                    'attributes' => [
                        'clave' => $paises[2]->clave,
                        'valor' => $paises[2]->valor,
                        'nacionalidad' => $paises[2]->nacionalidad,
                        'activo' => $paises[2]->activo,
                    ],
                    'links' => [
                        'self' => route('api.v1.catalogos.paises.show', $paises[2]->getRouteKey())
                    ]
                ],
            ],
            'links' => [
                'self' => route('api.v1.catalogos.paises.index')
            ]
        ]);
    }
}
