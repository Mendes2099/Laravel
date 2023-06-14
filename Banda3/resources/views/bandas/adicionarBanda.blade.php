@extends('layouts.layout')

{{-- Blade exclusiva para adição de Bandas --}}

@section('content')
    <h1>Bandas</h1>
    <!-- Conteúdo da página da banda aqui -->

    <a href="{{ route('adicionar-banda') }}" class="btn btn-primary">Adicionar nova Banda 🎸</a>
@endsection
