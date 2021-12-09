@extends('layouts.admin') {{-- Ele pega a pasta do templates e carrega aqi --}}

@section('title', 'Config')

@section('content')
    <h1>Configuraçãoes</h1>

    meu nome é {{ $nome }} Eu tenho {{ $idade }}
    <br>
    essa é uma variavel global, versão é {{ $versao }}
    <br>

    @if($idade > 90)
        eu sou maior de idade
    @else
        não sou maior de idade
    @endif



    <form method="post">
        @csrf
        name:
        <input name='nome' type="text">
        idade:
        <input name='idade' type="text">

        <input type="submit">
    </form>

    <a href="/config/user">Informações</a>
@endsection
