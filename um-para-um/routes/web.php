<?php

use Illuminate\Support\Facades\Route;

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
use App\Models\Cliente;
use App\Models\Endereco;


Route::get('/clientes', function () {
    $clientes = Cliente::all();
    foreach ($clientes as $c) {
        echo "<p>ID:" . $c->id . "</p>";
        echo "<p>Nome:" . $c->nome . "</p>";
        echo "<p>Telefone:" . $c->telefone . "</p>";
        echo "<p>Rua:" . $c->endereco->rua . "</p>";
        echo "<p>Numero:" . $c->endereco->numero . "</p>";
        echo "<p>Cidade:" . $c->endereco->cidade . "</p>";
        echo "<p>UF:" . $c->endereco->uf . "</p>";
        echo "<p>Cidade:" . $c->endereco->cidade . "</p>";
        echo "<p>Cep:" . $c->endereco->cep . "</p>";
        echo "<hr>";
    }
});

Route::get('/enderecos', function () {
    $endereco = Endereco::all();
    foreach ($endereco as $e) {
        echo "<p>Nome:" . $e->cliente->nome . "</p>";
        echo "<p>Telefone:" . $e->cliente->telefone . "</p>";
        echo "<p>cliente_id:" . $e->cliente_id . "</p>";
        echo "<p>Rua:" . $e->rua . "</p>";
        echo "<p>Numero:" . $e->numero . "</p>";
        echo "<p>Cidade:" . $e->cidade . "</p>";
        echo "<p>UF:" . $e->uf . "</p>";
        echo "<p>Cidade:" . $e->cidade . "</p>";
        echo "<p>Cep:" . $e->cep . "</p>";
        echo "<hr>";
    }
});

Route::get('/inserir', function () {
    $c = new Cliente();
    $c->nome = "Márcio Gabriel";
    $c->telefone = "8855669956";
    $c->save();
    ////////////////////
    $e = new Endereco();
    $e->rua = "Av. do Estado";
    $e->numero = 452;
    $e->bairro = "Centro";
    $e->cidade = "São Paulo";
    $e->uf = "SP";
    $e->cep = "13010-000";
    $c->endereco()->save($e);
    //////////////////////////
    $c = new Cliente();
    $c->nome = "Márcos";
    $c->telefone = "8855669956";
    $c->save();
    ////////////////////
    $e = new Endereco();
    $e->rua = "Av. do Estado";
    $e->numero = 42;
    $e->bairro = "Centro";
    $e->cidade = "São Paulo";
    $e->uf = "SP";
    $e->cep = "13010-000";
    $c->endereco()->save($e);
});


Route::get('/clientes/json', function(){
    //$clientes = Cliente::all();
    $clientes = Cliente::with(['endereco'])->get();
    return json_encode($clientes);
});
Route::get('/endereco/json', function(){
    //$enderecos = Endereco::all();
    $enderecos = Endereco::with(['cliente'])->get();
    return json_encode($enderecos);
});