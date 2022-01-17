@extends('layouts.admin') {{-- Ele pega a pasta do templates e carrega aqi --}}

@section('title', 'Login')

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

@lang('messages.test')


@section('content')

    <form method="post">
        @csrf
        <input type="email" name="email" placeholder="digite seu e-mail">
        <input type="password" name="password" placeholder="Digite sua senha">
        @if($tries<=3)
            <input type="submit" value="entrar">
        @else
            @lang('messages.tryError',['count'=>3])
        @endif
    </form>

    tentativas: {{$tries}}

@endsection