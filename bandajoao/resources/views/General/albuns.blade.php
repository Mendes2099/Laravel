@extends('layouts.layout')

@section('content')
    <h1>Álbuns de {{ $banda->nome }}</h1>
    <ul>
        @foreach($albuns as $album)
            <li>{{ $album->nome }}</li>
        @endforeach
    </ul>
@endsection

@section('content2')
@foreach($albums as $album)
    <div>
        <h3>{{ $album->nome }}</h3>
        <img src="{{ $album->foto }}" alt="{{ $album->nome }}">
        <p>{{ $album->data_lancamento }}</p>
@endsection



