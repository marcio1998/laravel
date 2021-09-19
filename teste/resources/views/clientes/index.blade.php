@extends('layouts.principal')
@section('conteudo')
@section('titulo', $titulo)
<h1>{{$titulo}}</h1>
@if (count($clientes)>0)
<ul>
    @foreach ($clientes as $c)
     <li>{{$c['nome']}} | {{$c['id']}}
        <a href="{{route('clientes.show', $c['id'])}}">Informações</a>
        <a href="{{route('clientes.edit', $c['id'])}}">EDITAR</a>
        <p>{{$loop->index}} | {{$loop->count}} | {{$loop->iteration}}</p>
        <form action="{{route('clientes.destroy', $c['id'])}}" method="POST">
            @method('DELETE')
            @csrf
            <input type="submit" value="APAGAR">
        </form>
     </li>
    
    @endforeach
</ul>
{{-- @else
<h4>Não Existe Usuários Cadastrados</h4> --}}
@endif

@empty($clientes)
    <h2>Não Existe Clientes Cadastrados</h2>
@endempty
<a href="{{route('clientes.create')}}">Cadastrar Novo Cliente</a>
@endsection