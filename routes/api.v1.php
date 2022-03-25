<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Catalogos\PaisController;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('register', [RegisterController::class, 'store'])->name('api.v1.register');

Route::group(['prefix' => 'catalogos'], function() {
    Route::apiResource('paises', PaisController::class, ['parameters'=>['paises'=>'pais']])->names('api.v1.catalogos.paises');
    Route::apiResource('municipios', PaisController::class)->names('api.v1.catalogos.municipios');
    //Route::get('paises/{pais}', [PaisController::class, 'show']);
});

