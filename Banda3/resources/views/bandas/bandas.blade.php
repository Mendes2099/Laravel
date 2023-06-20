@extends('layouts.layout')

@section('content')
    <div>
        <br>
        <h4>Todas as bandas</h4>

        <table class="table">
            <thead>
                <tr>
                    <th>Nome da Banda</th>
                    <th>Foto</th>
                    <th>Número de Álbuns</th>
                    <th>Álbuns</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bandas as $banda)
                    <tr>
                        <td>{{ $banda->nome }}</td>
                        <td><img src="{{ asset('storage/' . $banda->foto) }}" alt="Uma foto da banda {{ $banda->nome }}"
                                width="100px"></td>
                        <td>{{ $banda->numero_albuns }}</td>
                        <td>
                            <a href="{{ route('albuns.album', ['id' => $banda->id]) }}"
                                class="btn btn-primary">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

