<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BairroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'cidade' => new CidadeResource($this->whenLoaded('cidade')),
            'ruas' => RuaResource::collection($this->whenLoaded('ruas')),
        ];
    }
}
