<?php

namespace Tests\Feature\Catalogos\Paises;

use App\Models\Catalogos\CPais;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use Tests\MakesJsonApiRequests;
use Tests\TestCase;

class CrearPaisTest extends TestCase
{
    use RefreshDatabase, MakesJsonApiRequests;

    /** @test */
    public function pueden_crear_paises()
    {
        //$this->withoutExceptionHandling();
        $response= $this->postJson(route('api.v1.catalogos.paises.store'), [
            'clave' => 'PRB',
            'valor' => 'Pais de prueba',
            'nacionalidad' => 'Nacionalidad de prueba'
        ])->dump();

        $response->assertCreated();
        $pais = CPais::first();


        $response->assertHeader(
            'Location',
            route('api.v1.catalogos.paises.show', $pais)
        );

        $response->assertExactJson([
            'data' => [
                'type' => 'c_paises',
                'id' => (string) $pais->getRouteKey(),
                'attributes' => [
                    'clave' => 'PRB',
                    'valor' => 'Pais de prueba',
                    'nacionalidad' => 'Nacionalidad de prueba',
                    'activo' => 1
                ],
                'links' => [
                    'self' => route('api.v1.catalogos.paises.show', $pais)
                ]
            ]
        ]);
    }

    /** @test */
    public function valor_es_obligatorio()
    {
        //$this->withoutExceptionHandling();
        $response= $this->postJson(route('api.v1.catalogos.paises.store'), [
            'clave' => 'PRB',
            'nacionalidad' => 'Nacionalidad de prueba'
        ]);

        $response->assertJsonApiValidationErrors('valor');
    }

        /** @test */
    public function clave_es_obligatorio()
    {
        //$this->withoutExceptionHandling();
        $response= $this->postJson(route('api.v1.catalogos.paises.store'), [
                    'valor' => 'Pais de prueba',
                    'nacionalidad' => 'Nacionalidad de prueba'
        ]);

        $response->assertJsonApiValidationErrors('clave');
    }

    /** @test */
    public function clave_debe_tener_max_3_caracteres()
    {
        //$this->withoutExceptionHandling();
        $response= $this->postJson(route('api.v1.catalogos.paises.store'), [
            'valor' => 'Pais de prueba',
            'clave' => 'ABCA',
            'nacionalidad' => 'Nacionalidad de prueba'
        ]);

        $response->assertJsonApiValidationErrors('clave');
    }

    /** @test */
    public function nacionalidad_es_obligatorio()
    {
        //$this->withoutExceptionHandling();
        $response= $this->postJson(route('api.v1.catalogos.paises.store'), [
            'clave' => 'PRB',
            'valor' => 'Pais de prueba'
        ]);

        $response->assertJsonApiValidationErrors('nacionalidad');
    }
}
