@extends('layouts.layout')

@section('content')
    <h1>Bem-vindo à Home page das Bandas do Johnny! 😎</h1>
    <div>
        <br>
        <h4>Todas as bandas 🎸</h4>

        <p>Link do chat: https://chat.openai.com/share/e461ba65-cd6b-473b-8625-45f50ec6b6b4</p>
        <p style="font-weight: bold; color: red;"> Botões redirecionam corretamente. "Inserir" e "Editar" devem ser restritos </p>

        <p>Aqui temos uma tabela com o nome de uma banda, uma foto da mesma e o número de álbuns criados. + Ações conforme o user</p>
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
                            <a href="{{ route('post-adicionar-Album', ['id' => $banda->id]) }}"
                                class="btn btn-success">Inserir</a>
                            <a href="{{ route('editar-album', ['id' => $banda->id]) }}"
                                class="btn btn-info">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

