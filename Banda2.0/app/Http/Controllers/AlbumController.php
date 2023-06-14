<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index(Banda $banda)
    {
        $albuns = $banda->albuns;
        return view('albuns.index', compact('albuns'));
    }

    public function create()
    {
        return view('albuns.create');
    }

    public function store(Request $request)
    {
        // Lógica para salvar um novo álbum
    }

    public function edit(Album $album)
    {
        return view('albuns.edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        // Lógica para atualizar um álbum existente
    }

    public function destroy(Album $album)
    {
        // Lógica para excluir um álbum
    }
}
