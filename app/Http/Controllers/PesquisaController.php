<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;

class PesquisaController extends Controller
{
    public function pesquisa(Request $request){
        $pesquisa = $request->input('termo');

        $usuarios = User::where('name', 'like', '%'.$pesquisa.'%')->orWhere('email', 'like', '%'.$pesquisa.'%')->orWhere('username', 'like', '%'.$pesquisa.'%')->orWhere('id', 'like', '%'.$pesquisa.'%')->get();

        $produtos = Produto::where('nome', 'like', '%'.$pesquisa.'%')->orWhere('descricao', 'like', '%'.$pesquisa.'%')->orWhere('slug', 'like', '%'.$pesquisa.'%')->orWhere('id', 'like', '%'.$pesquisa.'%')->get();
        
        $categorias = Categoria::where('nome', 'like', '%'.$pesquisa.'%')->orWhere('slug', 'like', '%'.$pesquisa.'%')->orWhere('id', 'like', '%'.$pesquisa.'%')->get();

        $resultado = array(
            'termo' => $pesquisa,
            'usuarios' => $usuarios,
            'produtos' => $produtos,
            'categorias' => $categorias
        );

        return view("pesquisa", [
            "pageTitle" => "Pesquisa",
            "resultado" => $resultado
        ]);


    }
}
