<h1>Cadastrar Novo Cliente</h1>
<form action="{{route('clientes.store')}}" method="POST">
    @csrf
    <input type="text" value="nome" name="nome">
    <input type="submit" value="SALVAR">
</form>