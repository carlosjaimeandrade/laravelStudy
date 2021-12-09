@extends('layouts.admin') {{-- Ele pega a pasta do templates e carrega aqi --}}

@section('title', 'Config')

@section('content')
    <h1>Configuraçãoes</h1>
    <h1>Pegando os dados separado do controller</h1>
    meu nome é {{ $nome }} Eu tenho {{ $idade }}
    <br>
    essa é uma variavel global, versão é {{ $versao }}

    <br>
    <h1>Condição if else</h1>
    @if ($idade > 90)
        eu sou maior de idade
    @else
        não sou maior de idade
    @endif

    <br>

    @isset($nome)
        Existe
    @endisset

    <br>
    <h1>Loop FOR</h1>
    @for ($q = 0; $q < 10; $q++)
        o valor é {{ $q }}<br>
    @endfor
    <br>

    <h1>Loop em array com foreach</h1>

    @if (count($lista) > 0)
        Lista do bolo:
        <ul>
            @foreach ($lista as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    @endif

    <br>

    <h1>Loop em array com forelse</h1>
    <ul>
        @forelse ($lista as $item)
            <li>{{ $item }}</li>
        @empty
            <li>Não há ingrediente</li>
        @endforelse
    </ul>
    <br>

{{--     <h1>Loop em array com While</h1>
    @while()

    @endwhile --}}

    <h1>Formulario</h1>
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
