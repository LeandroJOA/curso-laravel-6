@extends('admin.layouts.app')


@section('title', "Editar Produto")

@section('content')
    <h1>Editar Produto {{ $id }}</h1>

    {{-- Formulario de atualização. Acessa diretamente a rota da action UPDATE e passa como parametro o $id recebido pelo controller --}}
    <form action=" {{ route('products.update', $id) }}" method="post">
        {{-- @@method - Gerar um "hidden input" determinando que o metodo será do tipo PUT --}}
        @method('PUT')
        {{-- @csrf - Gera um token de autenticação para permitir o envio do formulario --}}
        @csrf
        <input type="text" name="name" placeholder="Nome:">
        <input type="text" name="description" placeholder="Descrição:">
        <button type="submit">Enviar</button>
    </form>
@endsection