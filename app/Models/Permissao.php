<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    protected $table = 'permissoes';

    protected $fillable = [
        'habilitado',
        'tipo_usuario',
        'modulo',
        'ler',
        'editar',
        'criar',
        'excluir'
    ];
}
