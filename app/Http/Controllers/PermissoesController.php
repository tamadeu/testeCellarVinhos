<?php

namespace App\Http\Controllers;

use App\Models\Permissao;
use Illuminate\Http\Request;

class PermissoesController extends Controller
{
    public function index(){
        $permissoes = Permissao::all();
        return view("permissoes/index",[
            "pageTitle" => "Permissões",
            "permissoes" => $permissoes
        ]);
    }

    public function novo(Request $request){
        $userAtual = $request->user();
        return view("permissoes/novo",[
            "pageTitle" => "Permissões",
            "userAtual" => $userAtual
        ]);
    }

    public function criar(Request $request){

        $request->validate([
            'habilitado' => ['required', 'string', 'max:3'],
            'tipo_usuario' => ['required', 'integer','max:1'],
            'modulo' => ['required', 'string'],
            'ler' => ['required', 'string', 'max:3'],
            'editar' => ['required', 'string', 'max:3'],
            'criar' => ['required', 'string', 'max:3'],
            'excluir' => ['required', 'string', 'max:3'],
        ]);

        $permissao = Permissao::create([
            'habilitado' => $request->input('habilitado'),
            'tipo_usuario' => $request->input('tipo_usuario'),
            'modulo' => $request->input('modulo'),
            'ler' => $request->input('ler'),
            'editar' => $request->input('editar'),
            'criar' => $request->input('criar'),
            'excluir' => $request->input('excluir'),
        ]);

        return redirect()->back()->with('success','Permissão criada com sucesso');
    }

    public function editar($id, Request $request){
        $permissao = Permissao::find($id);
        $userAtual = $request->user();
        return view("permissoes/editar",[
            "pageTitle" => "Usuários",
            "permissao" => $permissao,
            "userAtual" => $userAtual
        ]);
    }

    public function atualizar(Request $request){

        $dados = $request->validate([
            'habilitado' => ['required', 'string', 'max:3'],
            'tipo_usuario' => ['required', 'integer','max:1'],
            'modulo' => ['required', 'string'],
            'ler' => ['required', 'string', 'max:3'],
            'editar' => ['required', 'string', 'max:3'],
            'criar' => ['required', 'string', 'max:3'],
            'excluir' => ['required', 'string', 'max:3'],
        ]);

        $permissao = Permissao::find($request->id);

        $permissao->update($dados);

        return redirect()->back()->with('success','Permissão atualizada com sucesso');
    }
    public function excluir($id){
        $permissao = Permissao::findOrFail($id);

        $permissao->delete();

        return redirect()->back()->with('success', 'Permissão excluída com sucesso');
    }
}
