<?php

namespace Tests\Feature\Catalogos\Sexos;

use App\Models\Catalogos\CPais;
use App\Models\Catalogos\CSexo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListarSexosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_buscar_un_solo_sexo()
    {
        $this->withoutExceptionHandling();
        $sexo = CSexo::factory()->create();
        //$response= $this->getJson('/v1/catalogos/sexos/'.$sexo->getRouteKey());
        $response= $this->getJson(route('api.v1.catalogos.sexos.show', $sexo->getRouteKey()));
        $response->assertJson([
            'data' => [
                'type' => 'sexos',
                'id' => $sexo->getRouteKey(),
                'attributes' => [
                    'clave' => $sexo->clave,
                    'valor' => $sexo->valor,
                    'activo' => $sexo->activo,
                ],
                'links' => [
                    'self' => route('api.v1.catalogos.sexos.show', $sexo->getRouteKey())
                ]
            ]
        ]);
    }

    /** @test */
    public function puede_obtener_todos_los_sexos()
    {
        $this->withoutExceptionHandling();
        $sexos = CSexo::factory(3)->create();
        $response= $this->getJson(route('api.v1.catalogos.sexos.index'));
        $response->assertJson([
            'data' => [
                [
                    'type' => 'sexos',
                    'id' => (string) $sexos[0]->getRouteKey(),
                    'attributes' => [
                        'clave' => $sexos[0]->clave,
                        'valor' => $sexos[0]->valor,
                        'activo' => $sexos[0]->activo,
                    ],
                    'links' => [
                        'self' => route('api.v1.catalogos.sexos.show', $sexos[0]->getRouteKey())
                    ]
                ],
                [
                    'type' => 'sexos',
                    'id' => (string) $sexos[1]->getRouteKey(),
                    'attributes' => [
                        'clave' => $sexos[1]->clave,
                        'valor' => $sexos[1]->valor,
                        'activo' => $sexos[1]->activo,
                    ],
                    'links' => [
                        'self' => route('api.v1.catalogos.sexos.show', $sexos[1]->getRouteKey())
                    ]
                ],
                [
                    'type' => 'sexos',
                    'id' => (string) $sexos[2]->getRouteKey(),
                    'attributes' => [
                        'clave' => $sexos[2]->clave,
                        'valor' => $sexos[2]->valor,
                        'activo' => $sexos[2]->activo,
                    ],
                    'links' => [
                        'self' => route('api.v1.catalogos.sexos.show', $sexos[2]->getRouteKey())
                    ]
                ],
            ],
            'links' => [
                'self' => route('api.v1.catalogos.sexos.index')
            ]
        ]);
    }
}
