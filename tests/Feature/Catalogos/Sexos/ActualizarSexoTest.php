<?php

namespace Tests\Feature\Catalogos\Sexos;

use App\Models\Catalogos\CPais;
use App\Models\Catalogos\CSexo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActualizarSexoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function pueden_actualizar_sexos()
    {
        //$this->withoutExceptionHandling();
        $sexo = CSexo::factory()->create();
        $response= $this->patchJson(route('api.v1.catalogos.sexos.update', $sexo), [
                    'clave' => 'X',
                    'valor' => 'Actualizado Sexo de prueba'
        ]);

        $response->assertOk();

        $response->assertHeader(
            'Location',
            route('api.v1.catalogos.sexos.show', $sexo)
        );

        $response->assertExactJson([
            'data' => [
                'type' => 'sexos',
                'id' => (string) $sexo->getRouteKey(),
                'attributes' => [
                    'clave' => 'X',
                    'valor' => 'Actualizado Sexo de prueba',
                    'activo' => 1
                ],
                'links' => [
                    'self' => route('api.v1.catalogos.sexos.show', $sexo)
                ]
            ]
        ]);
    }

    /** @test */
    public function valor_es_obligatorio()
    {
        //$this->withoutExceptionHandling();
        $sexo = CSexo::factory()->create();
        $response= $this->patchJson(route('api.v1.catalogos.sexos.update', $sexo), [
            'clave' => 'X'
        ]);

        $response->assertJsonApiValidationErrors('valor');
    }

    /** @test */
    public function clave_es_obligatorio()
    {
        //$this->withoutExceptionHandling();
        $sexo = CSexo::factory()->create();
        $response= $this->patchJson(route('api.v1.catalogos.sexos.update', $sexo), [
            'valor' => 'Sexo de prueba'
        ]);

        $response->assertJsonApiValidationErrors('clave');
    }

    /** @test */
    public function clave_debe_tener_max_1_caracteres()
    {
        //$this->withoutExceptionHandling();
        $sexo = CSexo::factory()->create();
        $response= $this->patchJson(route('api.v1.catalogos.sexos.update', $sexo), [
            'valor' => 'Sexo de prueba',
            'clave' => 'XX'
        ]);

        $response->assertJsonApiValidationErrors('clave');
    }


}
