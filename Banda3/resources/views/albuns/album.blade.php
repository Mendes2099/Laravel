@extends('layouts.layout')

@section('content')
    <h1>Albuns</h1>
    <br>
    <div>
        <h4>Todos os Albuns da banda 💽</h4>

        <p>A partir da tabela principal deve haver um botão que redirecione para esta blade para ver os álbuns da banda
            clicada. Ao clicar aqui abrirá uma nova tabela com os álbuns da banda, com os campos: (nome do álbum, imagem,
            data de lançamento.)</p>

            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome do Álbum</th>
                        <th>Imagem</th>
                        <th>Data de Lançamento</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Aqui você pode iterar sobre os álbuns da banda --}}
                    {{-- Substitua $banda->albuns pela variável que contém os álbuns da banda --}}
                    @foreach ($albuns as $album)
                        <tr>
                            <td>{{ $album->nome }}</td>
                            <td><img src="{{ asset('storage/' . $album->imagem) }}" alt="Capa do álbum {{ $album->nome }}" width="100px"></td>
                            <td>{{ $album->data_lancamento }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
