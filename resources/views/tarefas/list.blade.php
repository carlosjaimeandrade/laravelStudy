@extends('layouts.admin') {{-- Ele pega a pasta do templates e carrega aqi --}}

@section('title', 'Listar de tarefas')

@section('content')
    <h1>Listagem</h1>
    
    {{-- chamando uma variavel de sessao --}}
    @if (session('msg') != null)
        {{session('msg')}}
        {{Session::forget('msg')}}
    @endif
    <br>
    <a href="{{url('/tarefas/add')}}">Adicionar nova tarefa</a>

    @if (count($list) > 0)

        <ul>
            @foreach ($list as $value)
                <li>
                    <a href="{{ route('tarefas.done',['id'=>$value->id]) }}">@if ($value->resolvido === 1) Desmarcar @else Marcar @endif </a>
                    {{ $value->titulo }}
                    <a href="{{ route('tarefas.edit',['id'=>$value->id]) }}">Editar</a>
                    <a href="{{ route('tarefas.del',['id'=>$value->id]) }}">Excluir</a>
                </li>

            @endforeach
        </ul>
    @else
        Não há lista a serem listados
    @endif



@endsection
