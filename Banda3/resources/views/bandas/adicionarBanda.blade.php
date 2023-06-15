@extends('layouts.layout')

@section('content')
    <h1>Adicionar nova Banda</h1>

    <form action="{{ route('post-adicionar-banda') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            
            <label for="nome">Banda</label>
            <input type="text" name="nome" id="nome" class="form-control">
            @error('nome')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="numero_albuns">Número de Álbuns</label>
            <input type="number" name="numero_albuns" id="numero_albuns" class="form-control">
            @error('numero_albuns')
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
        <button type="submit" class="btn btn-primary">Adicionar 😎</button>
        <br>
    </form>
@endsection


