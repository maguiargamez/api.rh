<?php

namespace Tests\Feature\Catalogos\Paises;

use App\Models\Catalogos\CPais;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FiltrarPaisesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_filtrar_paises_por_valor()
    {
        CPais::factory()->create([
            'valor' => 'Narnia Laravel Go'
        ]);

        CPais::factory()->create([
            'valor' => 'Ding Dong Bell'
        ]);

        //paises?filter[valor]=Laravel
        $url = route('api.v1.catalogos.paises.index', [
            'filter' => [
                'valor' => 'Laravel'
            ]
        ]);
        //dd(urldecode($url));

        $response = $this->getJson($url);

        $response->assertJsonCount(1, 'data');
        $response->assertSee('Narnia Laravel Go');
        $response->assertDontSee('Ding Dong Bell');
    }

    /** @test */
    public function puede_filtrar_paises_por_clave()
    {
        CPais::factory()->create([
            'clave' => 'clave go'
        ]);

        CPais::factory()->create([
            'clave' => 'clave ra'
        ]);

        //paises?filter[valor]=Laravel
        $url = route('api.v1.catalogos.paises.index', [
            'filter' => [
                'clave' => 'ra'
            ]
        ]);
        //dd(urldecode($url));

        $response = $this->getJson($url);

        $response->assertJsonCount(1, 'data');
        $response->assertSee('clave ra');
        $response->assertDontSee('clave go');
    }

    /** @test */
    public function puede_filtrar_paises_por_anio()
    {
        CPais::factory()->create([
            'clave' => 'clave go',
            'created_at' => '2021-04-20 20:40:52'
        ]);

        CPais::factory()->create([
            'clave' => 'Clave ra',
            'created_at' => '2022-04-20 20:40:52'
        ]);

        //dd(CPais::query()->get());

        //paises?filter[valor]=Laravel
        $url = route('api.v1.catalogos.paises.index', [
            'filter' => [
                'year' => 2021
            ]
        ]);
        //dd(urldecode($url));

        $response = $this->getJson($url);

        $response->assertJsonCount(1, 'data');
        $response->assertSee('clave go');
        $response->assertDontSee('clave ra');
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
