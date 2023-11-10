<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriasController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view("categorias/index",[
            "pageTitle" => "Categorias",
            "categorias" => $categorias
        ]);
    }

    public function novo(Request $request){
        $userAtual = $request->user();
        return view("categorias/novo",[
            "pageTitle" => "Categorias",
            "userAtual" => $userAtual
        ]);
    }

    public function criar(Request $request){

        $slug = Str::slug($request->input('nome'));

        $request->validate([
            'nome' => ['required', 'string', 'max:20'],
            'slug' => ['string','max:50'],
        ]);

        $categoria = Categoria::create([
            'nome' => $request->input('nome'),
            'slug' => $slug,
        ]);

        return redirect()->back()->with('success','Categoria criada com sucesso');
    }

    public function editar($id, Request $request){
        $categoria = Categoria::find($id);
        $userAtual = $request->user();
        return view("categorias/editar",[
            "pageTitle" => "Categorias",
            "categoria" => $categoria,
            "userAtual" => $userAtual
        ]);
    }

    public function atualizar(Request $request){

        $slug = Str::slug($request->input('nome'));

        $request->validate([
            'nome' => ['required', 'string', 'max:20'],
            'slug' => ['required', 'string','max:50'],
        ]);

        $dados = Categoria::create([
            'nome' => $request->input('nome'),
            'slug' => $slug,
        ]);

        $categoria = Categoria::find($request->id);

        $categoria->update($dados);

        return redirect()->back()->with('success','Categoria atualizada com sucesso');
    }
    public function excluir($id){
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();

        return redirect()->back()->with('success', 'Categoria excluída com sucesso');
    }
}
