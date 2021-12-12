@extends('layouts.admin') {{-- Ele pega a pasta do templates e carrega aqi --}}

@section('title', 'Adicionar tarefas')

@section('content')
    <h1>Add tarefas</h1>

    @if (session('warning'))
        {{-- assim devemos fazer no laravel 8 para aparecer os componentes criado no AppSERVICEPROVIDER --}}
        <x-alert>
            @slot('type')
                Error de preenchimento
            @endslot

            @slot('subtitle')
                Motivo:
            @endslot

            {{session('warning')}}
        </x-alert>

    @endif

    <form method="post">
        @csrf

        <label for="">Titulo</label>
        <input name='titulo' type="text">
        <input type="submit">
    </form>
@endsection
