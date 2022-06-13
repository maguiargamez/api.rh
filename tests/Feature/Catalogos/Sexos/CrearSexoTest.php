<?php

namespace Tests\Feature\Catalogos\Sexos;


use App\Models\Catalogos\CSexo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use Tests\MakesJsonApiRequests;
use Tests\TestCase;

class CrearSexoTest extends TestCase
{
    use RefreshDatabase, MakesJsonApiRequests;

    /** @test */
    public function pueden_crear_sexos()
    {
        //$this->withoutExceptionHandling();
        $response= $this->postJson(route('api.v1.catalogos.sexos.store'), [
            'clave' => 'X',
            'valor' => 'Sexo de prueba'
        ])->dump();

        $response->assertCreated();
        $sexo = CSexo::first();

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
                    'valor' => 'Sexo de prueba',
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
        $response= $this->postJson(route('api.v1.catalogos.sexos.store'), [
            'clave' => 'X'
        ]);

        $response->assertJsonApiValidationErrors('valor');
    }

        /** @test */
    public function clave_es_obligatorio()
    {
        //$this->withoutExceptionHandling();
        $response= $this->postJson(route('api.v1.catalogos.sexos.store'), [
                    'valor' => 'Sexo de prueba',
        ]);

        $response->assertJsonApiValidationErrors('clave');
    }

    /** @test */
    public function clave_debe_tener_max_1_caracteres()
    {
        //$this->withoutExceptionHandling();
        $response= $this->postJson(route('api.v1.catalogos.sexos.store'), [
            'clave' => 'AB',
            'valor' => 'Pais de prueba'

        ]);

        $response->assertJsonApiValidationErrors('clave');
    }

}
