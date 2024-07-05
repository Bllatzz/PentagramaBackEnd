<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('v1/cidades', App\Http\Controllers\Api\V1\CidadeController::class);
Route::apiResource('v1/bairros', App\Http\Controllers\Api\V1\BairroController::class);
Route::apiResource('v1/ruas', App\Http\Controllers\Api\V1\RuaController::class);    
