@extends('layouts.app', ["current" => "categorias"])
@section('body')
   <div class="card-border">
        <div class="card-body">
            <form action="/categorias/{{$categoria->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Nome da Categoria: </label>
                    <input type="text" class="form-control mb-2" name="nomeCategoria" id="nomeCategoria"
                    placeholder="Categoria"value="{{$categoria->nome}}">
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>

                </div>
            </form>
        </div>
   </div>
@endsection