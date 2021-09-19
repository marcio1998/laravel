@extends('layouts.principal')
@section('conteudo')
    <h3>Departamentos</h3>
    <ul>
        <li>Computadores</li>
        <li>Eletrônicos</li>
        <li>Roupas</li>
    </ul>
{{-- @alerta(['titulo'=>'Erro Fatal', 'tipo'=>'info'])
    <p><strong>Erro Inesperado</strong></p>
    <p>Ocorreu um erro inesperado</p>
@endalerta --}}
<x-components-alerta titulo="erro" type="success">
    <p><strong>Erro Inesperado</strong></p>
    <p>Ocorreu um erro inesperado</p>
</x-components-alerta>
@component('components.alerta', ['titulo'=>'Erro Fatal', 'type'=>'error'])
    <p><strong>Erro Inesperado</strong></p>
    <p>Ocorreu um erro inesperado</p>
@endcomponent
@component('components.alerta', ['titulo'=>'Erro Fatal', 'type'=>'success'])
    <p><strong>Erro Inesperado</strong></p>
    <p>Ocorreu um erro inesperado</p>
@endcomponent
@endsection