@php
    use App\Models\User;
@endphp

@extends('layouts.layout')

@section('content')


<div class="mt-4">
    <h1>Todas as bandas🎸</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nome da Banda</th>
                <th>Foto</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bandas as $banda)
                <tr>
                    <td>{{ $banda->nome }}</td>
                    <td><img src="{{ asset('storage/' . $banda->foto) }}" alt="Foto da banda {{ $banda->nome }}" width="100px"></td>
                    <td>
                        <a href="{{ route('editar-banda', ['id' => $banda->id]) }}" class="btn btn-primary">Editar</a>
                        @if (Auth::user()->user_type == User::admin)
                            <a href="{{ route('apagar-banda', ['id' => $banda->id]) }}" class="btn btn-danger">Apagar</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <h1>Todos os álbuns💽</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nome do Álbum</th>
                <th>Foto</th>
                <th>Data de Lançamento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albuns as $album)
                <tr>
                    <td>{{ $album->nome }}</td>
                    <td><img src="{{ asset('storage/' . $album->imagem) }}" alt="Foto do álbum {{ $album->nome }}" width="100px"></td>
                    <td>{{ $album->data_lancamento }}</td>
                    <td>
                        <a href="{{ route('editar-album', ['id' => $album->id]) }}" class="btn btn-primary">Editar</a>
                        @if (Auth::user()->user_type == User::admin)
                            <a href="{{ route('apagar-album', ['id' => $album->id]) }}" class="btn btn-danger">Apagar</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    @if (Auth::user()->user_type == User::admin)
    <div class="text-center">
        <a href="{{ route('post-adicionar-banda') }}" class="btn btn-primary">Nova Banda🎸</a>
        <a href="{{ route('post-adicionar-Album') }}" class="btn btn-primary">Novo Álbum💽</a>
    </div>
@endif
</div>
@endsection
