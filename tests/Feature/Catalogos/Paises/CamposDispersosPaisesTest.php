<?php

namespace Tests\Feature\Catalogos\Paises;

use App\Models\Catalogos\CPais;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CamposDispersosPaisesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function campos_especificos_pueden_solicitarse()
    {
        $pais= CPais::factory()->create();
        // paises?fields[paises]=valor,clave
        $url = route('api.v1.catalogos.paises.index', [
            'fields' => [
                'paises' => 'valor,clave'
            ]
        ]);

        //dd($pais);

        //dd(urldecode($url));
        $response = $this->getJson($url)->dump();



        $response->assertJsonFragment([
            'valor' => $pais->valor,
            'clave' => $pais->clave
        ]);

        $response->assertJsonMissing([
            'nacionalidad'=> $pais->nacionalidad
        ]);

    }
}
