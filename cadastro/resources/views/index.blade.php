@extends('layouts.app', ["current"=>"home"])
@section('body')
    <div class="jumbotron bg-light border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Produtos</h5>
                        <p class="card-text">Aqui você cadastra todos os seus produtos só naõ se esqueça previamente as
                            categorias</p>
                        <a href="/produtos" class="btn btn-primary">Cadastre seus Produtos</a>
                    </div>

                </div>
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Departamentos</h5>
                        <p class="card-text">Cadastro de Categorias</p>
                        <a href="/categorias/novo" class="btn btn-primary">Cadastre suas Categorias</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
