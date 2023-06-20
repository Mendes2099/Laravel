@extends('layouts.layout')

@section('content')
    <p>Aqui você pode editar os detalhes da banda.</p>

    <form action="{{ route('atualizarBanda') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $banda->nome }}">
            @error('nome')
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
            <input type="hidden" name="id" value="{{ $banda->id}}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <br>
    </form>
@endsection
