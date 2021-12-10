@extends('layouts.admin') {{-- Ele pega a pasta do templates e carrega aqi --}}

@section('title', 'Listar de tarefas')

@section('content')
    <h1>Listagem</h1>

    @if (count($list) > 0)

        <ul>
            @foreach ($list as $value)
                <li>{{ $value->titulo }}</li>
            @endforeach
        </ul>
    @else
        Não há lista a serem listados
    @endif



@endsection
