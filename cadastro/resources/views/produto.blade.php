@extends('layouts.app', ["current"=>"produtos"])
@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>
            <table class="table table-ordered table-hover" id="tabelaProdutos">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Estoque</th>
                        <th>Preço</th>
                        <th>Departamento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" role="button" onclick="novoProduto()">Novo Produto</button>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formProduto">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo Produto</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">
                        <div class="form-group">
                            <label for="nomePorduto" class="control-label">Nome do Produto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nomeProduto" placeholder="Nome do Produto"
                                    name="nome">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="precoPorduto" class="control-label">Preço</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="precoProduto" placeholder="Preço do Produto"
                                    name="preco">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantidadePorduto" class="control-label">Quantidade do Produto</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="quantidadeProduto"
                                    placeholder="Quantidade do Produto" name="quantidade">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categoriaProduto" class="control-label">Departamento</label>
                            <div class="input-group">
                                <select type="text" class="form-control" id="categoriaProduto" name="categoria_id">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-md">Salvar</button>
                        <button type="cancel" class="btn btn-danger btn-md" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })


        function novoProduto() {
            $('#nomeProduto').val('');
            $('#precoProduto').val('');
            $('#quantidadeProduto').val('');
            $('#categoriaProduto').val('');
            $('#dlgProdutos').modal('show')

        }

        function carregarCategorias() {
            $.getJSON('/api/categorias', function(data) {
                console.log(data)
                //categoriaProduto
                data.forEach(function(e) {
                    opcao = '<option value="' + e.id + '" >' + e.nome + '</option>'
                    $('#categoriaProduto').append(opcao)
                })
            })
        }

        function carregarProdutos() {
            $.getJSON('api/produtos', function(data) {
                data.forEach(function(e) {
                    let linha = montarLinha(e)
                    $('#tabelaProdutos>tbody').append(linha)
                })
            })
        }

        function montarLinha(produto) {
            let linha = '<tr>' +
                "<td>" + produto.id + "</td>" +
                "<td>" + produto.nome + "</td>" +
                "<td>" + produto.estoque + "</td>" +
                "<td>" + produto.preco + "</td>" +
                "<td>" + produto.categoria_id + "</td>" +
                "<td>" +
                '<button class="btn btn-primary btn-sm mr-2" onClick="editar(' + produto.id + ')">' + 'Editar' +
                "</button>" +
                '<button class="btn btn-danger btn-sm" onClick="remover(' + produto.id + ')">' + 'Apagar' + "</button>" +
                "</td>" +
                "</tr>"
            return linha
        }

        $(function() {
            carregarCategorias()
            carregarProdutos()
        })

        function criarProduto() {
            const produto = {
                nome: $('#nomeProduto').val(),
                preco: $('#precoProduto').val(),
                quantidade: $('#quantidadeProduto').val(),
                categoria: $('#categoriaProduto').val(),
            }
            return produto;
        }


        function salvarProduto() {
            const produto = {
                id: $('#id').val(),
                nome: $('#nomeProduto').val(),
                preco: $('#precoProduto').val(),
                quantidade: $('#quantidadeProduto').val(),
                categoria: $('#categoriaProduto').val(),
            }
            $.ajax({
                type: 'PUT',
                url: "/api/produtos/" + produto.id,
                context: this,
                data: produto,
                success: function(data) {
                    prod = JSON.parse(data)
                    linhas = $('#tabelaProdutos>tbody>tr')
                    linha = linhas.filter(function(index, elemento) {
                        return (elemento.cells[0].textContent == prod.id);
                    })
                    console.log(linha)
                    if (linha) {
                        linha[0].cells[0].textContent = prod.id;
                        linha[0].cells[1].textContent = prod.nome;
                        linha[0].cells[2].textContent = prod.estoque;
                        linha[0].cells[3].textContent = prod.preco;
                        linha[0].cells[4].textContent = prod.categoria_id;
                    }
                },
                error: function(error) {
                    console.log('ERRO:' + error)
                }

            });
        }

        function remover(id) {
            $.ajax({
                type: 'DELETE',
                url: "/api/produtos/" + id,
                context: this,
                success: function(data) {
                    linhas = $('#tabelaProdutos>tbody>tr');
                    linha = linhas.filter(function(index, elemento) {
                        return elemento.cells[0].textContent == id;
                    });
                    console.log(linha)
                    linha.remove()
                },
                error: function(error) {
                    console.log('ERRO:' + error)
                }

            });

        }

        function editar(id) {
            $.getJSON('/api/produtos/' + id, function(data) {
                $('#id').val(data.id);
                $('#nomeProduto').val(data.nome);
                $('#precoProduto').val(data.preco);
                $('#quantidadeProduto').val(data.estoque);
                $('#categoriaProduto').val(data.categoria_id);
                $('#dlgProdutos').modal('show')
            })
        }

        $('#formProduto').submit(function(event) {
            event.preventDefault();
            if ($('#id').val() != '') {
                salvarProduto()
            } else {
                const produto = criarProduto();
                $.post('/api/produtos', produto, function(data) {
                    let produto = JSON.parse(data);
                    let linha = montarLinha(produto)
                    $('#tabelaProdutos>tbody').append(linha)
                })
            }

            $('#dlgProdutos').modal('hide');
        })
    </script>
@endsection
