<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        "nome",
        "categoria_id",
        "descricao",
        "preco",
        "slug",
        "largura",
        "altura",
        "profundidade",
        "volume",
        "estoque",
        "habilitado"
    ];
}
