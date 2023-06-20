@extends('layouts.layout')

@section('content')
    <p>Aqui você pode editar os detalhes do Album. 💽</p>

    <form action="{{ route('atualizarAlbum') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $album->nome }}">
            @error('nome')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="data_lancamento">Data de Lançamento</label>
            <input type="date" name="data_lancamento" id="data_lancamento" class="form-control"  value="{{ $album->data_lancamento }}">
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
            <input type="hidden" name="id" value="{{ $album->id}}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Atualizar 💽</button>
        <br>
    </form>
@endsection
