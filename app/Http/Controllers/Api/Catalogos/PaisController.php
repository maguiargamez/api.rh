<?php

namespace App\Http\Controllers\Api\Catalogos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\GuardarPaisRequest;
use App\Http\Resources\Catalogos\PaisCollection;
use App\Http\Resources\Catalogos\PaisResource;
use App\Models\Catalogos\CPais;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): PaisCollection
    {
        $paises= CPais::query()
            ->allowedFilters(['clave', 'valor', 'month', 'year'])
            ->allowedSorts(['clave', 'valor'])
            ->sparseFieldset()
            ->jsonPaginate();

        //dd($paises->jsonPaginate());
        return PaisCollection::make($paises);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Catalogos\GuardarPaisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarPaisRequest $request): PaisResource
    {
        //dd($request);
        $pais = CPais::create($request->validated());

        return PaisResource::make($pais);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pais): PaisResource
    {
        $pais = CPais::where('id', $pais)
            ->sparseFieldset()
            ->firstOrFail();
        //$tt = PaisResource::make($pais);
        //dd($tt);
        return PaisResource::make($pais);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Catalogos\GuardarPaisRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CPais $pais, GuardarPaisRequest $request) : PaisResource
    {
        /*$request->validate(
            [
                'clave'=> 'required|string|max:3|unique:c_paises,clave,'.$pais->id,
                'valor'=> 'required|string|max:255',
                'nacionalidad'=> 'required|string|max:255'
            ]);*/
        $pais->update($request->validated());

        return PaisResource::make($pais);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CPais $pais)
    {
        $pais->delete();
        return response()->noContent();
    }
}
