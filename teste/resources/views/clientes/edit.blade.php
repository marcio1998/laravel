<h3>Cliente a Ser editado: </h3>
<form action="{{route('clientes.update', $cliente['id'])}}" method="POST">
    @method('PUT')
    @csrf
    <input type="text" value="{{$cliente['nome']}}" name="nome">
    <input type="submit" value="EDITAR">
</form>