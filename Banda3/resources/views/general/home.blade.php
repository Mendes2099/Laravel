@extends('layouts.layout')

@section('content')
    <h1>Home</h1>
    <div>
        <br>
        <h4>Bem-vindo à página inicial do Bandas do Johnny! 😎
        @auth
        {{ Auth::user()->name }}
        @endauth
    </h4>
    </div>
@endsection

