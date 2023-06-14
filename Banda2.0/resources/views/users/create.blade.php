@extends('layouts.layout')

@section('content')
    <h1>Create User</h1>
    <form method="POST" action="/users">
        @csrf
        <!-- Campos do formulário para criar um novo usuário -->
        <button type="submit">Create</button>
    </form>
@endsection
