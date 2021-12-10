@extends('layouts.admin') {{-- Ele pega a pasta do templates e carrega aqi --}}

@section('title', 'Adicionar tarefas')

@section('content')
    <h1>Add tarefas</h1>

    <form method="post">
        @csrf

        <label for="">Titulo</label>
        <input name='titulo' type="text">
        <input type="submit">
    </form>
@endsection

