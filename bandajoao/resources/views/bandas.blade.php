@extends('layout')

@section('content')
    <h1>Bandas</h1>
    <ul>
        @foreach($bandas as $banda)
            <li>{{ $banda->nome }}</li>
        @endforeach
    </ul>
@endsection

