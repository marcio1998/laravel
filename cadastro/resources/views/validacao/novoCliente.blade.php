<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Validacao Formulários</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            padding: 20px;
        }

    </style>
</head>

<body>
    <main role="main">
        <div class="row">
            <div class="container col-md-8 offset-md-2">
                <div class="card border">
                    <div class="card-header">
                        <div class="card-title">
                            Cadastro de Cliente
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/clientes" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome Do Cliente</label>
                                <input type="text" id="nome"
                                    class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" name="nome"
                                    placeholder="Nome do Cliente">
                                @if ($errors->has('nome'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nome') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="idade">Idade Do Cliente</label>
                                <input type="number" id="idade"
                                    class="form-control {{ $errors->has('idade') ? 'is-invalid' : '' }}" name="idade"
                                    placeholder="Idade do Cliente">
                                @if ($errors->has('idade'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('idade') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereço Do Cliente</label>
                                <input type="text" id="endereco" class="form-control" name="endereco"
                                    placeholder="Endereço do Cliente">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Do Cliente</label>
                                <input type="text" id="email" class="form-control" name="email"
                                    placeholder="Email do Cliente">
                            </div>
                            <button type="submit" class="btn btn-primary btn-md">Salvar</button>
                        </form>
                    </div>
                    @if ($errors->any())
                        <div class="card-footer">
                            @foreach ($errors->all() as $e)
                                <div class="alert alert-danger" role="alert">
                                    {{ $e }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
    {{ var_dump($errors) }}
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
