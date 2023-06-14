@extends('layouts.layout')

@section('content')
    <h1>Albuns</h1>
    <br>
    <div>
        <h4>Todos os Albuns da banda (Placeholder) 💽</h4>

        <p>A partir da tabela principal deve haver um botão que redirecione para esta blade para ver os álbuns da banda clicada. Ao clicar aqui abrirá uma nova tabela com os álbuns da banda, com os campos: (nome do álbum, imagem, data de lançamento.)</p>


        {{-- @foreach ($bandas as $banda)
            <div>
                <h5>{{ $banda->nome }}</h5>
                <p>Número de álbuns: {{ $banda->numero_albuns }}</p>
                <!-- Outras informações da banda -->
            </div>
        @endforeach --}}
    </div>
@endsection
