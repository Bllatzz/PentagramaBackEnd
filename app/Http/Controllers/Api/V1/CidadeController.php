<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CidadeResource;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function index()
    {
        return CidadeResource::collection(Cidade:: with('bairros.ruas')->get());
    }

    public function store(Request $request)
    {
        $cidade = Cidade::create($request->all());
        return new CidadeResource($cidade);
    }

    public function show(Cidade $cidade)
    {
        return new CidadeResource($cidade->load('bairros.ruas'));
    }

    public function update(Request $request, Cidade $cidade)
    {
        $cidade->update($request->all());
        return new CidadeResource($cidade);
    }

    public function destroy(Cidade $cidade)
    {
        $cidade->delete();
        return response()->noContent();
    }
}
