@extends('layouts.principal')
@section('conteudo')
@section('titulo', 'opcoes')
<div class="options">
    <ul>
        <li><a href="{{ route('opcoes', 1) }}" class="warning {{(request()->opcao == 1) ? 'selected' : ''}}">Warning</a></li>
        <li><a href="{{ route('opcoes', 2) }}" class="info {{(request()->opcao == 2) ? 'selected' : ''}}" >Info</a></li>
        <li><a href="{{ route('opcoes', 3) }}" class="success {{(request()->opcao == 3) ? 'selected' : ''}} ">Success</a></li>
        <li><a href="{{ route('opcoes', 4) }}" class="error {{(request()->opcao == 4) ? 'selected' : ''}}">Error</a></li>
    </ul>
</div>
@if (isset($opcao))
    @switch($opcao)
        @case(1)
            @component('components.alerta', ['titulo' => 'Erro Fatal', 'type' => 'warning'])
                <p><strong>Erro Inesperado</strong></p>
                <p>Ocorreu um erro inesperado</p>
            @endcomponent
        @break
        @case(2)
            @component('components.alerta', ['titulo' => 'Erro Fatal', 'type' => 'info'])
                <p><strong>Erro Inesperado</strong></p>
                <p>Ocorreu um erro inesperado</p>
            @endcomponent
        @break
        @case(3)
            @component('components.alerta', ['titulo' => 'Erro Fatal', 'type' => 'success'])
                <p><strong>Erro Inesperado</strong></p>
                <p>Ocorreu um erro inesperado</p>
            @endcomponent
        @break
        @case(4)
            @component('components.alerta', ['titulo' => 'Erro Fatal', 'type' => 'error'])
                <p><strong>Erro Inesperado</strong></p>
                <p>Ocorreu um erro inesperado</p>
            @endcomponent
        @break
        @default

    @endswitch
@endif
@endsection
