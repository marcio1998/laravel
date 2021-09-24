<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaControlador extends Controller
{
    public function index(){
        echo "<h4>Lista de Categorias</h4>";
        echo "<ul>";
        echo "<li>Macarrão</li>";
        echo "<li>Feijão</li>";
        echo "<li>Arroz</li>";
        echo "<li>Carne Bovinha</li>";
        echo "</ul>";
        if(Auth::check()){
            $user = Auth::user();
            echo "<hr>";
            echo "<h4>".$user."</h4>";
        }else{
            echo "<h4>Você Não Esta Logado</h4>";
        }
    }
}
