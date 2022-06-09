<?php

namespace App\Http\Controllers\Api\Catalogos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\GuardarEntidadFederativaRequest;
use App\Http\Resources\Catalogos\EntidadFederativaCollection;
use App\Http\Resources\Catalogos\EntidadFederativaResource;
use App\Models\Catalogos\CEntidadFederativa;
use Illuminate\Http\Request;

class EntidadFederativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entidadesFederativas= CEntidadFederativa::query()
            ->allowedFilters(['clave', 'valor', 'month', 'year'])
            ->allowedSorts(['clave', 'valor'])
            ->sparseFieldset()
            ->jsonPaginate();

        return EntidadFederativaCollection::make($entidadesFederativas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarEntidadFederativaRequest $request): EntidadFederativaResource
    {
        $entidadFederativa = CEntidadFederativa::create($request->validated());

        return EntidadFederativaResource::make($entidadFederativa);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($entidadFederativa): EntidadFederativaResource
    {
        $entidadFederativa = CEntidadFederativa::where('id', $entidadFederativa)
            ->sparseFieldset()
            ->firstOrFail();

        return EntidadFederativaResource::make($entidadFederativa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CEntidadFederativa $entidadFederativa, GuardarEntidadFederativaRequest $request): EntidadFederativaResource
    {
        $entidadFederativa->update($request->validated());

        return EntidadFederativaResource::make($entidadFederativa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CEntidadFederativa $entidadFederativa)
    {
        $entidadFederativa->delete();
        return response()->noContent();
    }
}
