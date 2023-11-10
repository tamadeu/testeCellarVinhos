<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view("users/index",[
            "pageTitle" => "Usuários",
            "users" => $users
        ]);
    }

    public function editar($id, Request $request){
        $usuario = User::find($id);
        $userAtual = $request->user();
        return view("users/editar",[
            "pageTitle" => "Usuários",
            "usuario" => $usuario,
            "userAtual" => $userAtual
        ]);
    }

    public function novo(Request $request){
        $userAtual = $request->user();
        return view("users/novo",[
            "pageTitle" => "Usuários",
            "userAtual" => $userAtual
        ]);
    }

    public function criar(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'max:255', 'unique:'.User::class],
            'type' => ['required', 'integer'],
            'username' => ['required', 'string', 'lowercase', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'type' => $request->type
        ]);

        return redirect()->back()->with('success','Usuário criado com sucesso');
    }

    public function atualizar(Request $request){

        $dados = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'type' => 'required|integer',
            'username' => 'string',
        ]);

        $usuario = User::find($request->id);

        $usuario->update($dados);

        return redirect()->back()->with('success','Usuário atualizado com sucesso');
    }

    public function excluir($id){
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back()->with('success', 'Usuário excluído com sucesso');
    }
}
