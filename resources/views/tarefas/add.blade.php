@extends('layouts.admin') {{-- Ele pega a pasta do templates e carrega aqi --}}

@section('title', 'Adicionar tarefas')

@section('content')
    <h1>Add tarefas</h1>

    {{-- any verifica se tem algum erro contido --}}
    @if ($errors->any())
        {{-- assim devemos fazer no laravel 8 para aparecer os componentes criado no AppSERVICEPROVIDER --}}
        
        <x-alert>
            @slot('type')
                Error de preenchimento feito pela validação
            @endslot

            @slot('subtitle')
                Motivo:
            @endslot

            {{-- aqui passamos por todos os erros contido --}}
            @foreach($errors->all() as $error)
                {{$error}} <br>
            @endforeach
        </x-alert>

    @endif

    <form method="post">
        @csrf

        <label for="">Titulo</label>
        <input name='titulo' type="text">
        <input type="submit">
    </form>
@endsection
