{{-- Herda o conteudo presente na view no caminho /admin/layouts/app --}}
@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

{{-- @section() - Substitui a linha que contem um @yield() de mesmo nome na view pai, pelo conteudo dentro desta '@section()' --}}
@section('content')
    <h1>Exibindo os produtos</h1>

    {{-- Chama o metodo CREATE da rota products atraves de seu nome --}}
    <a href="{{ route('products.create') }}">Cadastrar</a>
    <hr>

    {{--Inclui o conteudo da view "card", onde tudo dentro deste @component será passado e armazenado em uma variavel "$slot"--}}
    @component('admin.components.card')
        {{--Além do slot padrão, envia um de nome "title", responsavel por armazenar tudo dentro de @slot--}}
        @slot('title')
            <h1>Titulo Card</h1>
        @endslot
        Um card de exemplo
    @endcomponent

    <hr>

    {{--Inclui o conteudo da view "alert", passando como parametro um array com string--}}
    @include('admin.includes.alert', ['content' => 'Alerta de preços de produtos'])

    <hr>

    {{ $teste }}

    {{--CONDICIONAIS BLADE--}}

    {{--Condicional if, elseif e else--}}
    @if($teste === 123)
        <br>É igual a 123
    @elseif($teste == '123')
        <br>É igual a "123"
    @else
        <br>Não é igual
    @endif

    {{--Condicional com logica inversa ao do IF--}}
    @unless($teste === 123)
        <br>Não é igual a 123
    @else
        <br>É igual a 123
    @endunless

    {{--Verifica se determinada variavel existe/foi passada como parametro--}}
    @isset($teste2)
        <br>A variavel teste existe
    @else
        <br>A variavel não existe
    @endisset

    {{--Verifica se determinada variavel esta vazia--}}
    @empty($teste3)
        <br>Vazio
    @else
        <br>Não vazio
    @endempty

    {{--Verifica se o usuario esta autenticado--}}
    @auth
        <br>Autenticado
    @else
        <br>Não autenticado
    @endauth

    {{--Verifica se o usuario não esta autenticado--}}
    @guest
        <br>Não autenticado. Como visitante
    @endguest

    {{--Condicional switch. Possui cases, breaks e default--}}
    @switch($teste2)
        @case(1)
        <br>Igual a 1
        @break
        @case(2)
        <br>Igual a 2
        @break
        @default
        <br>Diferente de 1 e 2
    @endswitch

    {{--ESTRUTURA DE REPETIÇÂO BLADE--}}

    {{--Estrutura de repetição ForEach--}}
    @isset($products)
        @foreach($products as $product)
            {{--Caso este seja o ultimo ou o primeiro elemento do array, altera sua classe para "last", mudando a cor do background--}}
            <p class="@if($loop->last || $loop->first) last @endif">{{ $product }}</p>
        @endforeach
    @endisset

    {{--ForEach com um @empty embutido. Verifica se determinado array esta vazio--}}
    @forelse($teste3 as $product)
        <br>{{ $product }}
    @empty
        <br>Não existem produtos cadastrados
    @endforelse
@endsection

{{--Substitui um @stack de mesmo nome com o conteudo presente entre @push e @endpush--}}
@push('styles')
    <style>
        .last {
            background-color: #CCCCCC
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.body.style.background = '#efefef';
    </script>
@endpush
