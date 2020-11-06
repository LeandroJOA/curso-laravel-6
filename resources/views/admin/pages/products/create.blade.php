@extends('admin.layouts.app')


@section('title', "Cadastrar Novo Produto")

@section('content')
    <h1>Cadastrat Novo Produto</h1>

    {{-- Formulario de cadastro. Acessa diretamente a rota com nome 
        products.store --}}
    <form action=" {{ route('products.store') }}" method="post">
        {{-- @csrf - Gera um token de autenticação para permitir o envio do formulario --}}
        @csrf
        <input type="text" name="name" placeholder="Nome:">
        <input type="text" name="description" placeholder="Descrição:">
        <button type="submit">Enviar</button>
    </form>

    <hr>

    {{-- Formulario para upload de arquivos
    enctype="multipart/form-data" - Atributo obrigatorio para se enviar um arquivo --}}
    <form action=" {{ route('products.store') }}" method="post" enctype="multipart/form-data">
        {{-- @csrf - Gera um token de autenticação para permitir o envio do formulario --}}
        @csrf
        <input type="text" name="nameFile" placeholder="Nome do Arquivo:">
        <input type="file" name="photo">
        <button type="submit">Enviar</button>
    </form>
@endsection

