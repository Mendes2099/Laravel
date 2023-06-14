@extends('layouts.layout')

@section('content')
    <h1>Albuns</h1>
    <br>
    <div>
        <h4>Todas os Albuns 💽</h4>
        {{-- @foreach ($bandas as $banda)
            <div>
                <h5>{{ $banda->nome }}</h5>
                <p>Número de álbuns: {{ $banda->numero_albuns }}</p>
                <!-- Outras informações da banda -->
            </div>
        @endforeach --}}
    </div>
@endsection
