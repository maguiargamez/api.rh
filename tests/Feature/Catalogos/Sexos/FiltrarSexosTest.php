<?php

namespace Tests\Feature\Catalogos\Sexos;

use App\Models\Catalogos\CPais;
use App\Models\Catalogos\CSexo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FiltrarSexosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_filtrar_sexos_por_valor()
    {
        CSexo::factory()->create([
            'valor' => 'Indefinido'
        ]);

        CSexo::factory()->create([
            'valor' => 'No se'
        ]);

        //paises?filter[valor]=Laravel
        $url = route('api.v1.catalogos.sexos.index', [
            'filter' => [
                'valor' => 'se'
            ]
        ]);
        //dd(urldecode($url));

        $response = $this->getJson($url);

        $response->assertJsonCount(1, 'data');
        $response->assertSee('No se');
        $response->assertDontSee('Indefinido');
    }

    /** @test */
    public function puede_filtrar_sexos_por_clave()
    {
        CSexo::factory()->create([
            'clave' => 'X'
        ]);

        CSexo::factory()->create([
            'clave' => 'C'
        ]);

        //paises?filter[valor]=Laravel
        $url = route('api.v1.catalogos.sexos.index', [
            'filter' => [
                'clave' => 'C'
            ]
        ]);
        //dd(urldecode($url));

        $response = $this->getJson($url);

        $response->assertJsonCount(1, 'data');
        $response->assertSee('C');
        $response->assertDontSee('X');
    }

    /** @test */
    public function puede_filtrar_sexos_por_anio()
    {
        CSexo::factory()->create([
            'clave' => 'A',
            'created_at' => '2021-04-20 20:40:52'
        ]);

        CSexo::factory()->create([
            'clave' => 'B',
            'created_at' => '2022-04-20 20:40:52'
        ]);

        dd(CSexo::query()->get());

        //paises?filter[valor]=Laravel
        $url = route('api.v1.catalogos.sexos.index', [
            'filter' => [
                'year' => 2021
            ]
        ]);
        //dd(urldecode($url));

        $response = $this->getJson($url)->dump();
        //dd($response);

        $response->assertJsonCount(1, 'data');
        $response->assertSee('A');
        $response->assertDontSee('B');
    }

    /** @test */
    public function puede_filtrar_paises_por_mes()
    {
        CPais::factory()->create([
            'clave' => 'clave go',
            'created_at' => '2021-04-20 20:40:52'
        ]);

        CPais::factory()->create([
            'clave' => 'clave ra',
            'created_at' => '2022-04-20 20:40:52'
        ]);

        CPais::factory()->create([
            'clave' => 'clave raaaaa',
            'created_at' => '2022-03-20 20:40:52'
        ]);

        //dd(CPais::query()->get());

        //paises?filter[valor]=Laravel
        $url = route('api.v1.catalogos.paises.index', [
            'filter' => [
                'month' => 4
            ]
        ]);
        //dd(urldecode($url));

        $response = $this->getJson($url);

        $response->assertJsonCount(2, 'data');
        $response->assertSee('clave go');
        $response->assertSee('clave ra');
        $response->assertDontSee('clave raaaaa');
    }

    /** @test */
    public function no_puede_filtrar_paises_por_filtros_desconocidos()
    {
        CPais::factory()->count(3)->create();
        //dd(CPais::query()->get());

        //paises?filter[unknwon]=Laravel
        $url = route('api.v1.catalogos.paises.index', [
            'filter' => [
                'unknwon' => 'filter'
            ]
        ]);
        //dd(urldecode($url));

        $response = $this->getJson($url);

        $response->assertStatus(400);
    }
}
