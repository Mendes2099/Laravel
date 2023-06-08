@extends('layout')

@section('content')
    <h1>Álbuns de {{ $banda->nome }}</h1>
    <ul>
        @foreach($albuns as $album)
            <li>{{ $album->nome }}</li>
        @endforeach
    </ul>
@endsection

