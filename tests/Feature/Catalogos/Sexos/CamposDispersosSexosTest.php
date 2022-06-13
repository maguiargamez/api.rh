<?php

namespace Tests\Feature\Catalogos\Sexos;

use App\Models\Catalogos\CPais;
use App\Models\Catalogos\CSexo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CamposDispersosSexosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function campos_especificos_pueden_solicitarse_index()
    {
        $sexo= CSexo::factory()->create();
        // sexos?fields[sexos]=valor,clave
        $url = route('api.v1.catalogos.sexos.index', [
            'fields' => [
                'sexos' => 'id,valor'
            ]
        ]);

        //dd($pais);

        //dd(urldecode($url));
        $response = $this->getJson($url);

        $response->assertJsonFragment([
            'valor' => $sexo->valor
        ]);

        $response->assertJsonMissing([
            'clave'=> $sexo->clave,
            'activo'=> $sexo->activo
        ]);

    }

    /** @test */
    public function campos_especificos_pueden_solicitarse_show()
    {
        $sexo= CSexo::factory()->create();
        // sexos?fields[sexos]=valor,clave
        $url = route('api.v1.catalogos.sexos.show', [
            'sexo' => $sexo,
            'fields' => [
                'sexos' => 'id,valor'
            ]
        ]);

        //dd($pais);
        //dd(urldecode($url));
        $response = $this->getJson($url);

        $response->assertJsonFragment([
            'valor' => $sexo->valor
        ]);

        $response->assertJsonMissing([
            'clave'=> $sexo->clave,
            'activo'=> $sexo->activo
        ]);

    }

    /** @test */
    public function clave_de_ruta_debe_ser_agregada_automaticamente_index()
    {
        $sexo= CSexo::factory()->create();
        // sexos?fields[sexos]=valor,clave
        $url = route('api.v1.catalogos.sexos.index', [
            'fields' => [
                'sexos' => 'valor'
            ]
        ]);

        //dd($pais);
        //dd(urldecode($url));
        $response = $this->getJson($url)->dump();
        //dd($response);

        $response->assertJsonFragment([
            'valor' => $sexo->valor
        ]);

        $response->assertJsonMissing([
            'id'=> $sexo->id,
            'clave'=> $sexo->clave,
            'activo'=> $sexo->activo
        ]);

    }

    /** @test */
    public function clave_de_ruta_debe_ser_agregada_automaticamente_show()
    {
        $sexo= CSexo::factory()->create();
        // sexos?fields[sexos]=valor,clave
        $url = route('api.v1.catalogos.sexos.show', [
            'sexo' => $sexo,
            'fields' => [
                'sexos' => 'valor'
            ]
        ]);

        //dd($sexo);
        //dd(urldecode($url));
        $response = $this->getJson($url)->dump();


        $response->assertJsonFragment([
            //'id'=> $sexo->id,
            'valor' => $sexo->valor
        ]);

        $response->assertJsonMissing([
            'clave'=> $sexo->clave,
            'activo'=> $sexo->activo
        ]);

    }
}
