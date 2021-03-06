@extends('layouts.admin') {{-- Ele pega a pasta do templates e carrega aqi --}}

@section('title', 'Listar de tarefas')

@section('content')
    <h1>Listagem</h1>

    {{-- chamando uma variavel de sessao --}}
    @if (session('msg') != null)
        <x-alert>
            @slot('type')
                Sucesso
            @endslot

            @slot('subtitle')
                Motivo:
            @endslot
            {{ session('msg') }}
        </x-alert>
    @endif
    <br>
    <a href="{{ url('/tarefas/add') }}">Adicionar nova tarefa</a>

    @if (count($list) > 0)

        <ul>
            @foreach ($list as $value)
                <li>
                    <a href="{{ route('tarefas.done', ['id' => $value->id]) }}">@if ($value->resolvido === 1) Desmarcar @else Marcar @endif </a>
                    {{ $value->titulo }}
                    <a href="{{ route('tarefas.edit', ['id' => $value->id]) }}">Editar</a>
                    <a href="{{ route('tarefas.del', ['id' => $value->id]) }}" onclick="return confirm('Tem certeza que deseja excluir ?')">Excluir</a>
                </li>

            @endforeach
        </ul>
    @else
        Não há lista a serem listados
    @endif



@endsection
