<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $usuarios = User::all();
        $categorias = Categoria::all();
        $produtos = Produto::all();

        return view("index",[
            "pageTitle" => "Dashboard",
            "usuarios" => $usuarios,
            "categorias" => $categorias,
            "produtos" => $produtos
        ]);
    }
}
