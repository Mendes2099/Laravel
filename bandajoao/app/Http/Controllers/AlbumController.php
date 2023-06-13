<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Exibe uma lista de álbuns.
     */
    public function index()
    {
        $albuns = Album::all();

        return view('albuns.index', compact('albuns'));
    }

    /**
     * Exibe o formulário para criar um novo álbum.
     */
    public function create()
    {
        return view('albuns.create');
    }

    /**
     * Armazena um novo álbum no banco de dados.
     */
    public function store(Request $request)
    {
        // Valida os dados de entrada
        $request->validate([
            'nome' => 'required',
            'imagem' => 'required|image',
            'data_lancamento' => 'required|date',
        ]);

        // Cria uma nova instância de álbum
        $album = new Album();
        $album->nome = $request->input('nome');
        // Salva a imagem no armazenamento e armazena o caminho da imagem no banco de dados
        $caminhoImagem = $request->file('imagem')->store('imagens_album');
        $album->imagem = $caminhoImagem;
        $album->data_lancamento = $request->input('data_lancamento');
        $album->save();

        return redirect()->route('albuns.index')->with('success', 'Álbum criado com sucesso.');
    }

    /**
     * Exibe o álbum específico.
     */
    public function show(Album $album)
    {
        return view('albuns.show', compact('album'));
    }

    /**
     * Exibe o formulário para editar o álbum específico.
     */
    public function edit(Album $album)
    {
        return view('albuns.edit', compact('album'));
    }

    /**
     * Atualiza o álbum específico no banco de dados.
     */
    public function update(Request $request, Album $album)
    {
        // Valida os dados de entrada
        $request->validate([
            'nome' => 'required',
            'imagem' => 'image',
            'data_lancamento' => 'required|date',
        ]);

        $album->nome = $request->input('nome');

        if ($request->hasFile('imagem')) {
            // Exclui a imagem antiga
            Storage::delete($album->imagem);

            // Salva a nova imagem no armazenamento e atualiza o caminho da imagem no banco de dados
            $caminhoImagem = $request->file('imagem')->store('imagens_album');
            $album->imagem = $caminhoImagem;
        }

        $album->data_lancamento = $request->input('data_lancamento');
        $album->save();

        return redirect()->route('albuns.index')->with('success', 'Álbum atualizado com sucesso.');
    }

    /**
     * Remove o álbum específico do banco de dados.
     */
    public function destroy(Album $album)
    {
        // Exclui a imagem do álbum do armazenamento
        Storage::delete($album->imagem);

        // Exclui o álbum do banco de dados
        $album->delete();

        return redirect()->route('albuns.index')->with('success', 'Álbum excluído com sucesso.');
    }
}
