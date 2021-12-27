@extends('layouts.admin') {{-- Ele pega a pasta do templates e carrega aqi --}}

@section('title', 'Login')

@section('content')

    <form method="post">
        @csrf
        <input type="email" name="email" placeholder="digite seu e-mail">
        <input type="password" name="password" placeholder="Digite sua senha">

        <input type="submit" value="entrar">
    </form>

@endsection