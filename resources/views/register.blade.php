@extends('layouts.admin') {{-- Ele pega a pasta do templates e carrega aqi --}}

@section('title', 'Cadastro')

@if ($errors->any())
    <x-alert>
        @slot('type')
            Error de preenchimento feito pela validação
        @endslot

        @slot('subtitle')

        @endslot

        {{-- aqui passamos por todos os erros contido --}}
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </x-alert>
@endif


@section('content')

    <form method="post">
        @csrf

        <input type="text" name="name" placeholder="digite o seu nome" value="{{ old('name') }}">
        <input type="email" name="email" placeholder="digite seu e-mail" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Digite sua senha">
        <input type="password" name="password_confirmation" placeholder="Confirme sua senha">
        <input type="submit" value="entrar">
    </form>

@endsection
