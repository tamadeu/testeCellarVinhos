<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdutosController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        
        return view("produtos/index",[
            "pageTitle" => "Produtos",
            "produtos" => $produtos,
            'categoria' => function ($categoria_id) { return Categoria::where(['id' => $categoria_id])->first(); },
        ]);
    }

    public function novo(Request $request){
        $userAtual = $request->user();
        $categorias = Categoria::all();
        return view("produtos/novo",[
            "pageTitle" => "Produtos",
            "userAtual" => $userAtual,
            "categorias" => $categorias
        ]);
    }

    public function criar(Request $request){

        $slug = Str::slug($request->input('nome'));

        $request->validate([
            'nome' => ['required', 'string', 'max:50'],
            'slug' => ['string','max:100'],
            'categoria_id' => ['integer','max:3'],
            'descricao' => ['string','max:255'],
            'preco' => ['numeric'],
            'largura' => ['numeric'],
            'altura' => ['numeric'],
            'profundidade' => ['numeric'],
            'volume' => ['numeric'],
            'estoque' => ['integer'],
            'habilitado' => ['integer','max:1'],
        ]);

        $produto = Produto::create([
            'nome' => $request->input('nome'),
            'slug' => $slug,
            'categoria_id' => $request->input('categoria_id'),
            'descricao' => $request->input('descricao'),
            'preco' => $request->input('preco'),
            'largura' => $request->input('largura'),
            'altura' => $request->input('altura'),
            'profundidade' => $request->input('profundidade'),
            'volume' => $request->input('volume'),
            'estoque' => $request->input('estoque'),
            'habilitado' => $request->input('habilitado'),
        ]);

        return redirect()->back()->with('success','Produto criado com sucesso');
    }

    public function editar($id, Request $request){
        $produto = Produto::find($id);
        $categorias = Categoria::all();
        $userAtual = $request->user();
        return view("produtos/editar",[
            "pageTitle" => "Produtos",
            "produto" => $produto,
            "userAtual" => $userAtual,
            "categorias" => $categorias
        ]);
    }

    public function atualizar(Request $request){

        $slug = Str::slug($request->input('nome'));

        $request->validate([
            'nome' => ['required', 'string', 'max:50'],
            'slug' => ['string','max:100'],
            'categoria_id' => ['integer','max:3'],
            'descricao' => ['string','max:255'],
            'preco' => ['numeric'],
            'largura' => ['numeric'],
            'altura' => ['numeric'],
            'profundidade' => ['numeric'],
            'volume' => ['numeric'],
            'estoque' => ['integer'],
            'habilitado' => ['integer','max:1'],
        ]);

        $dados = Produto::create([
            'nome' => $request->input('nome'),
            'slug' => $slug,
            'categoria_id' => $request->input('categoria_id'),
            'descricao' => $request->input('descricao'),
            'preco' => $request->input('preco'),
            'largura' => $request->input('largura'),
            'altura' => $request->input('altura'),
            'profundidade' => $request->input('profundidade'),
            'volume' => $request->input('volume'),
            'estoque' => $request->input('estoque'),
            'habilitado' => $request->input('habilitado'),
        ]);

        $produto = Produto::find($request->id);

        $produto->update($dados);

        return redirect()->back()->with('success','Produto atualizado com sucesso');
    }
    public function excluir($id){
        $produto = Produto::findOrFail($id);

        $produto->delete();

        return redirect()->back()->with('success', 'Produto excluído com sucesso');
    }
}
