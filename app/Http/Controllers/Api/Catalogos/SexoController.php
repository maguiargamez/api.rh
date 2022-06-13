<?php

namespace App\Http\Controllers\Api\Catalogos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\GuardarSexoRequest;
use App\Http\Resources\Catalogos\SexoCollection;
use App\Http\Resources\Catalogos\SexoResource;
use App\Models\Catalogos\CSexo;
use Illuminate\Http\Request;

class SexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sexos= CSexo::query()
            ->allowedFilters(['clave', 'valor', 'month', 'year'])
            ->allowedSorts(['clave', 'valor'])
            ->sparseFieldset()
            ->jsonPaginate();

        return SexoCollection::make($sexos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarSexoRequest $request): SexoResource
    {
        $sexo = CSexo::create($request->validated());

        return SexoResource::make($sexo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sexo): SexoResource
    {
        $sexo = CSexo::where('id', $sexo)
            ->sparseFieldset()
            ->firstOrFail();

        return SexoResource::make($sexo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CSexo $sexo,GuardarSexoRequest $request): SexoResource
    {
        $sexo->update($request->validated());
        return SexoResource::make($sexo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CSexo $sexo)
    {
        $sexo->delete();
        return response()->noContent();
    }
}
