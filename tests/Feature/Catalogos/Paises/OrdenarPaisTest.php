<?php

namespace Tests\Feature\Catalogos\Paises;

use App\Models\Catalogos\CPais;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrdenarPaisTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_ordenar_paises_por_valor()
    {
        CPais::factory()->create(['valor'=>'C valor']);
        CPais::factory()->create(['valor'=>'A valor']);
        CPais::factory()->create(['valor'=>'B valor']);


        $url = route('api.v1.c_paises.index', ['sort' => 'valor']);

        $this->getJson($url)->assertSeeInOrder([
            'A valor', 'B valor', 'C valor'
        ]);
    }

    /** @test */
    public function puede_ordenar_paises_por_clave()
    {
        CPais::factory()->create(['clave'=>'C clave']);
        CPais::factory()->create(['clave'=>'A clave']);
        CPais::factory()->create(['clave'=>'B clave']);


        $url = route('api.v1.c_paises.index', ['sort' => 'clave']);

        $this->getJson($url)->assertSeeInOrder([
            'A clave', 'B clave', 'C clave'
        ]);
    }

    /** @test */
    public function puede_ordenar_paises_por_valor_desc()
    {
        CPais::factory()->create(['valor'=>'C valor']);
        CPais::factory()->create(['valor'=>'A valor']);
        CPais::factory()->create(['valor'=>'B valor']);


        $url = route('api.v1.c_paises.index', ['sort' => '-valor']);

        $this->getJson($url)->assertSeeInOrder([
            'C valor', 'B valor', 'A valor'
        ]);
    }

    /** @test */
    public function puede_ordenar_paises_por_clave_desc()
    {
        CPais::factory()->create(['clave'=>'C clave']);
        CPais::factory()->create(['clave'=>'A clave']);
        CPais::factory()->create(['clave'=>'B clave']);


        $url = route('api.v1.c_paises.index', ['sort' => '-clave']);

        $this->getJson($url)->assertSeeInOrder([
            'C clave', 'B clave', 'A clave'
        ]);
    }

    /** @test */
    public function puede_ordenar_paises_por_valor_y_clave()
    {
        CPais::factory()->create(['clave'=>'A clave', 'valor'=> 'A valor']);
        CPais::factory()->create(['clave'=>'B clave', 'valor'=> 'B valor']);
        CPais::factory()->create(['clave'=>'A clave', 'valor'=> 'C valor' ]);


        $url = route('api.v1.c_paises.index', ['sort' => 'clave,-valor']);

        //dd($this->getJson($url));

        $this->getJson($url)->assertSeeInOrder([
            'C valor', 'A valor', 'B valor'
        ]);
    }

    /** @test */
    public function no_puede_ordenar_paises_por_campos_desconocidos()
    {
        CPais::factory()->count(3)->create();

        //paises?sort=unknown
        $url = route('api.v1.c_paises.index', ['sort' => 'unknown']);

        //dd($this->getJson($url));

        $this->getJson($url)->assertStatus(400);
    }
}
