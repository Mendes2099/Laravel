@extends('layouts.layout')

{{-- Blade de display de bandas --}}

@section('content')
    <h1>Bandas</h1>
    <br>
    <div>
        <h4>Todas as bandas 🎸</h4>
        {{--       <!-- Tabela com as informações das bandas -->
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Foto</th>
                    <th>Número de Álbuns</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bandas as $banda)
                    <tr>
                        <td>{{ $banda->nome }}</td>
                        <td>
                            @if ($banda->foto)
                                <img src="{{ $banda->foto }}" alt="{{ $banda->nome }}" width="100">
                            @else
                                Sem foto
                            @endif
                        </td>
                        <td>{{ $banda->numero_albuns }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
    </div>
@endsection

