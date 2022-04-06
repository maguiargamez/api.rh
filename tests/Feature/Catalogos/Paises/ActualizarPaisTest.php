<?php

namespace Tests\Feature\Catalogos\Paises;

use App\Models\Catalogos\CPais;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActualizarPaisTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function pueden_actualizar_paises()
    {
        //$this->withoutExceptionHandling();

        $pais = CPais::factory()->create();

        $response= $this->patchJson(route('api.v1.catalogos.paises.update', $pais), [
                    'clave' => 'PRA',
                    'valor' => 'Actualizado Pais de prueba',
                    'nacionalidad' => 'Actualizado Nacionalidad de prueba'
        ]);

        $response->assertOk();

        $response->assertHeader(
            'Location',
            route('api.v1.catalogos.paises.show', $pais)
        );

        $response->assertExactJson([
            'data' => [
                'type' => 'c_paises',
                'id' => (string) $pais->getRouteKey(),
                'attributes' => [
                    'clave' => 'PRA',
                    'valor' => 'Actualizado Pais de prueba',
                    'nacionalidad' => 'Actualizado Nacionalidad de prueba',
                    'activo' => 1
                ],
                'links' => [
                    'self' => route('api.v1.catalogos.paises.show', $pais)
                ]
            ]
        ]);
    }
}
