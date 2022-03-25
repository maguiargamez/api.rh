<?php

namespace App\Http\Controllers\Api\Catalogos;

use App\Http\Controllers\Controller;
use App\Http\Resources\Catalogos\PaisCollection;
use App\Http\Resources\Catalogos\PaisResource;
use App\Models\Catalogos\CPais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): PaisCollection
    {
        return PaisCollection::make(CPais::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'clave'=> 'required|string|max:3|unique:c_paises',
                'valor'=> 'required|string|max:255',
                'nacionalidad'=> 'required|string|max:255'
            ]);

            $pais = CPais::create($request->all());

        return $pais;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CPais $pais): PaisResource
    {
        return PaisResource::make($pais);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CPais $pais)
    {
        $request->validate(
            [
                'clave'=> 'required|string|max:3|unique:c_paises,clave,'.$pais->id,
                'valor'=> 'required|string|max:255',
                'nacionalidad'=> 'required|string|max:255'
            ]);

        $pais->update($request->all());

        return $pais;
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
        return $pais;
    }
}
