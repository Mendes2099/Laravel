@extends('layouts.layout')

@section('content')
    <h1>Adicionar novo Album a: (Placeholder) 💽</h1>

    <br>

    <h2 style="font-weight: bold; color: red;"> BLADE INCOMPLETA! necessário configurar: ( Rotas do Album / AlbumController / Album Model)</h2>

    <p>Aqui pode adicionar novos albuns que serão mostrados na blade /album (Terá que passar ).</p>

    <form action="{{ route('post-adicionar-Album') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control-file">
            @error('foto')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Adicionar 💽</button>
        <br>
    </form>
@endsection
