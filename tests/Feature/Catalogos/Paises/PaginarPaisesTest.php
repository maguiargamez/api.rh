<?php

namespace Tests\Feature\Catalogos\Paises;

use App\Models\Catalogos\CPais;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaginarPaisesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_paginar_paises()
    {
        $paises= CPais::factory()->count(6)->create();

        //paises?page[size]=2&page[number]=2
        $url = route('api.v1.c_paises.index', [
            'page' => [
                'size' => 2,
                'number' => 2
            ]
        ]);

        $response = $this->getJson($url);

        $response->assertSee([
            $paises[2]->clave,
            $paises[3]->clave
        ]);

        $response->assertDontSee([
            $paises[0]->clave,
            $paises[1]->clave,
            $paises[4]->clave,
            $paises[5]->clave
        ]);

        $response->assertJsonStructure([
            'links' => ['first', 'last', 'prev', 'next']
        ]);

        $firstLink = urldecode($response->json('links.first'));
        $lastLink = urldecode($response->json('links.last'));
        $prevLink = urldecode($response->json('links.prev'));
        $nextLink = urldecode($response->json('links.next'));

        //dd($firstLink);

        $this->assertStringContainsString('page[size]=2', $firstLink);
        $this->assertStringContainsString('page[number]=1', $firstLink);

        $this->assertStringContainsString('page[size]=2', $lastLink);
        $this->assertStringContainsString('page[number]=3', $lastLink);

        $this->assertStringContainsString('page[size]=2', $prevLink);
        $this->assertStringContainsString('page[number]=1', $prevLink);

        $this->assertStringContainsString('page[size]=2', $nextLink);
        $this->assertStringContainsString('page[number]=3', $nextLink);
    }

    /** @test */
    public function puede_paginar_paises_ordenados()
    {
        CPais::factory()->create(['valor'=>'C valor']);
        CPais::factory()->create(['valor'=>'A valor']);
        CPais::factory()->create(['valor'=>'B valor']);

        //paises?sort=valor&page[size]=1&page[number]=2
        $url = route('api.v1.c_paises.index', [
            'sort' => 'valor',
            'page' => [
                'size' => 1,
                'number' => 2
            ]
        ]);

        $response = $this->getJson($url);

        $response->assertSee([
            'B valor'
        ]);

        $response->assertDontSee([
            'A valor',
            'C valor'
        ]);

        $firstLink = urldecode($response->json('links.first'));
        $lastLink = urldecode($response->json('links.last'));
        $prevLink = urldecode($response->json('links.prev'));
        $nextLink = urldecode($response->json('links.next'));

        $this->assertStringContainsString('sort=valor', $firstLink);
        $this->assertStringContainsString('sort=valor', $lastLink);
        $this->assertStringContainsString('sort=valor', $prevLink);
        $this->assertStringContainsString('sort=valor', $nextLink);
    }

    /** @test */
    public function puede_paginar_paises_filtrados()
    {
        CPais::factory()->count(3)->create();
        CPais::factory()->create(['valor'=>'C laravel']);
        CPais::factory()->create(['valor'=>'A laravel']);
        CPais::factory()->create(['valor'=>'B laravel']);

        //paises?filter[valor]=laravel&page[size]=1&page[number]=2
        $url = route('api.v1.c_paises.index', [
            'filter[valor]' => 'laravel',
            'page' => [
                'size' => 1,
                'number' => 2
            ]
        ]);

        $response = $this->getJson($url);

        $firstLink = urldecode($response->json('links.first'));
        $lastLink = urldecode($response->json('links.last'));
        $prevLink = urldecode($response->json('links.prev'));
        $nextLink = urldecode($response->json('links.next'));

        $this->assertStringContainsString('filter[valor]=laravel', $firstLink);
        $this->assertStringContainsString('filter[valor]=laravel', $lastLink);
        $this->assertStringContainsString('filter[valor]=laravel', $prevLink);
        $this->assertStringContainsString('filter[valor]=laravel', $nextLink);
    }
}
