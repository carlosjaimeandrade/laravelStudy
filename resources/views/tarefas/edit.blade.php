@extends('layouts.admin') {{-- Ele pega a pasta do templates e carrega aqi --}}

@section('title', 'Adicionar Editar')

@section('content')
    <h1>Editar tarefas</h1>

    <form method="post">
        @csrf

        <label for="">Titulo</label>
        <input value='{{$list[0]->titulo}}' name='titulo' type="text">
        <input type="submit">
    </form>
@endsection