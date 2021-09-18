<h3>Todos os clientes:</h3>
<ul>
    @foreach ($clientes as $c)
     <li>{{$c['nome']}} | {{$c['id']}}
        <a href="{{route('clientes.show', $c['id'])}}">Informações</a>
        <a href="{{route('clientes.edit', $c['id'])}}">EDITAR</a>
        <form action="{{route('clientes.destroy', $c['id'])}}" method="POST">
            @method('DELETE')
            @csrf
            <input type="submit" value="APAGAR">
        </form>
     </li>
    
    @endforeach
</ul>
<a href="{{route('clientes.create')}}">Cadastrar Novo Cliente</a>