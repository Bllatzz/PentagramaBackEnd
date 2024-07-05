<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BairroResource;
use App\Models\Bairro;
use Illuminate\Http\Request;

class BairroController extends Controller
{
    public function index()
    {
        return BairroResource::collection(Bairro::with('cidade', 'ruas')->get());
    }

    public function store(Request $request)
    {
        $bairro = Bairro::create($request->all());
        return new BairroResource($bairro);
    }

    public function show(Bairro $bairro)
    {
        return new BairroResource($bairro->load('cidade', 'ruas'));
    }

    public function update(Request $request, Bairro $bairro)
    {
        $bairro->update($request->all());
        return new BairroResource($bairro);
    }

    public function destroy(Bairro $bairro)
    {
        $bairro->delete();
        return response()->noContent();
    }
}
