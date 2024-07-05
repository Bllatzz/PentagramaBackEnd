<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\RuaResource;
use App\Models\Rua;
use Illuminate\Http\Request;

class RuaController extends Controller
{
    public function index()
    {
        return RuaResource::collection(Rua::with('bairro')->get());
    }

    public function store(Request $request)
    {
        $rua = Rua::create($request->all());
        return new RuaResource($rua);
    }

    public function show(Rua $rua)
    {
        return new RuaResource($rua->load('bairro'));
    }

    public function update(Request $request, Rua $rua)
    {
        $rua->update($request->all());
        return new RuaResource($rua);
    }

    public function destroy(Rua $rua)
    {
        $rua->delete();
        return response()->noContent();
    }
}
