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
    public function campos_especificos_pueden_solicitarse_index()
    {
        $pais= CPais::factory()->create();
        // paises?fields[paises]=valor,clave
        $url = route('api.v1.catalogos.paises.index', [
            'fields' => [
                'paises' => 'id,valor'
            ]
        ]);

        //dd($pais);

        //dd(urldecode($url));
        $response = $this->getJson($url);

        $response->assertJsonFragment([
            'valor' => $pais->valor
        ]);

        $response->assertJsonMissing([
            'clave'=> $pais->clave,
            'nacionalidad'=> $pais->nacionalidad,
            'activo'=> $pais->activo
        ]);

    }

    /** @test */
    public function campos_especificos_pueden_solicitarse_show()
    {
        $pais= CPais::factory()->create();
        // paises?fields[paises]=valor,clave
        $url = route('api.v1.catalogos.paises.show', [
            'pais' => $pais,
            'fields' => [
                'paises' => 'id,valor'
            ]
        ]);

        //dd($pais);

        //dd(urldecode($url));
        $response = $this->getJson($url);



        $response->assertJsonFragment([
            'valor' => $pais->valor
        ]);

        $response->assertJsonMissing([
            'clave'=> $pais->clave,
            'nacionalidad'=> $pais->nacionalidad,
            'activo'=> $pais->activo
        ]);

    }

    /** @test */
    public function clave_de_ruta_debe_ser_agregada_automaticamente_index()
    {
        $pais= CPais::factory()->create();
        // paises?fields[paises]=valor,clave
        $url = route('api.v1.catalogos.paises.index', [
            'fields' => [
                'paises' => 'valor'
            ]
        ]);

        //dd($pais);

        //dd(urldecode($url));
        $response = $this->getJson($url);



        $response->assertJsonFragment([
            'valor' => $pais->valor
        ]);

        $response->assertJsonMissing([
            'id'=> $pais->id,
            'clave'=> $pais->clave,
            'nacionalidad'=> $pais->nacionalidad,
            'activo'=> $pais->activo
        ]);

    }

    /** @test */
    public function clave_de_ruta_debe_ser_agregada_automaticamente_show()
    {
        $pais= CPais::factory()->create();
        // paises?fields[paises]=valor,clave
        $url = route('api.v1.catalogos.paises.show', [
            'pais' => $pais,
            'fields' => [
                'paises' => 'valor'
            ]
        ]);

        //dd($pais);

        //dd(urldecode($url));
        $response = $this->getJson($url);



        $response->assertJsonFragment([
            'valor' => $pais->valor
        ]);

        $response->assertJsonMissing([
            'id'=> $pais->id,
            'clave'=> $pais->clave,
            'nacionalidad'=> $pais->nacionalidad,
            'activo'=> $pais->activo
        ]);

    }
}
