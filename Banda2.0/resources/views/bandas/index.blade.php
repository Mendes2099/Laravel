
// Tenta atender: O sistema deve conter uma tabela principal onde aparecem todas as bandas Nesta tabela constará o nome da banda, uma foto da mesma e o número de álbuns criados.

@extends('layouts.layout')

@section('content')
    <h1>Bandas</h1>
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
                        <img src="{{ $banda->foto }}" alt="{{ $banda->nome }}" width="100">
                    </td>
                    <td>{{ $banda->albuns->count() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
