<?php

use Illuminate\Support\Facades\Route;
use App\Models\Categoria;
use App\Models\Produto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/categorias', function () {
    $categorias = Categoria::all();
    foreach($categorias as $c){
        echo "<p>Categoria ID: ".$c->id."</p>";
        echo "<p>Categoria Nome: ".$c->nome."</p>";
        foreach($c->produto as $p){
            echo "<p>Produto Nome: ".$p->nome."</p>";
        }
        echo '<hr>';
    }
});
Route::get('/produtos', function () {
    $produtos = Produto::all();
    foreach($produtos as $p){
        echo "<p> ID: ".$p->id."</p>";
        echo "<p>Produto Nome: ".$p->nome."</p>";
        echo "<p>Produto Preco: ".$p->preco."</p>";
        echo "<p>Produto Estoque: ".$p->estoque."</p>";
        echo "<p>Produto Categoria: ".$p->categoria->nome."</p>";
        echo '<hr>';
    }
});

Route::get('/categoriaprodutos/json', function(){
    $categorias = Categoria::with('produto')->get();
    return json_encode($categorias);
});

Route::get('/adicionarProduto', function(){
    $cat = Categoria::find(1);
    $p = new Produto();
    $p->nome = 'Meu Novo Produto';
    $p->preco = 500;
    $p->estoque = 8;
    //$p->categoria_id = 3;
    $p->categoria()->associate($cat);
    $p->save();
    return $p->toJson();
});
Route::get('/desacociarCategoria', function(){
    $p = Produto::find(8);
    $p->categoria()->dissociate();
    $p->save();
    return $p->toJson();
});

Route::get('/adicionarCategoria/{cat}', function($cat){
    $catId = Categoria::find($cat);
    $p = new Produto();
    $p->nome = 'Meu Novo Produto';
    $p->preco = 500;
    $p->estoque = 8;
    //$p->categoria_id = 3;
    $p->categoria()->associate($catId);
    $p->save();
    return $p->toJson();

});
