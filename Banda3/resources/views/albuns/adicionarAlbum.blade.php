@php
    use App\Models\User;
@endphp
@extends('layouts.layout')
@section('content')
@if(Auth::user()->user_type == User::admin)

    <h1>Adicionar novo Album 💽</h1>
    <br>
    <div>

    <form action="{{ route('post-adicionar-Album') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <select  class="custom-select" name="banda_id">
            <option value="" selected>Todas as bandas</option>
            @foreach ($todasbandas as $item)
            <option @if ($item->id == request()->query('banda_id')) selected @endif value="{{ $item->id }}">
            {{ $item->nome }} </option>
            @endforeach
        </select>

        <div class="form-group">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control">
            @error('nome')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="data_lancamento">Data de Lançamento</label>
            <input type="date" name="data_lancamento" id="data_lancamento" class="form-control">
            @error('data_lancamento')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="imagem" id="foto" class="form-control-file">
            @error('imagem')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Adicionar 💽</button>
        <br>
    </form>

@else
<h3>Não tem acesso a essa página</h3>
@endif
@endsection
