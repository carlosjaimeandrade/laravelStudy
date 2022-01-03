@extends('layouts.admin') {{-- Ele pega a pasta do templates e carrega aqi --}}

@section('title', 'Cadastro')

@if(session('warning'))
<x-alert>
    @slot('type')
        Error de preenchimento feito pela validação
    @endslot

    @slot('subtitle')
        Motivo:
    @endslot

    {{-- aqui passamos por todos os erros contido --}}
    {{session('warning')}}
</x-alert>
@endif


@section('content')

    <form method="post">
        @csrf
        
        <input type="text" name="nome" placeholder="digite o seu nome">
        <input type="email" name="email" placeholder="digite seu e-mail">
        <input type="password" name="password" placeholder="Digite sua senha">
        <input type="password_confirmation" name="password" placeholder="Confirme sua senha">
        <input type="submit" value="entrar">
    </form>

@endsection