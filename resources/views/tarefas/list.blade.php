@extends('layouts.admin') {{-- Ele pega a pasta do templates e carrega aqi --}}

@section('title', 'Listar de tarefas')

@section('content')
    <h1>Listagem</h1>

    <a href="">Adicionar nova tarefa</a>

    @if (count($list) > 0)

        <ul>
            @foreach ($list as $value)
                <li>
                    <a href="">@if ($value->resolvido === 1) @else Marcar @endif </a>
                    {{ $value->titulo }}
                    <a href="">Editar</a>
                    <a href="">Excluir</a>
                </li>

            @endforeach
        </ul>
    @else
        Não há lista a serem listados
    @endif



@endsection
