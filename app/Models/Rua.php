<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rua extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cep', 'bairro_id'];

    public function bairro()
    {
        return $this->belongsTo(Bairro::class);
    }
}
