@extends('layouts.layout')

{{-- Blade de display de bandas --}}

@section('content')
    <h1>Bandas</h1>
    <br>
    <div>
        <h4>Todas as bandas 🎸</h4>
        {{-- @foreach ($bandas as $banda)
            <div>
                <h5>{{ $banda->nome }}</h5>
                <p>Número de álbuns: {{ $banda->numero_albuns }}</p>
                <!-- Outras informações da banda -->
            </div>
        @endforeach --}}
    </div>
@endsection

