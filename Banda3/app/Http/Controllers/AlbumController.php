<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Models\Banda;


class AlbumController extends Controller
{
    public function album()
    {
        return view('albuns.album');
    }

    public function index()
    {
        $albuns = Album::all(); // Pega em todos os albuns da Base de dados
        return view('albuns.album', compact('albuns')); // Passa a var $albuns para a view
    }

    public function editarAlbum()
    {
        // Add your logic here to retrieve and process data for the view
        $albuns = Album::all(); // Retrieve all albums from the database

        return view('albuns.editarAlbum', compact('albuns'));
    }

    //!------------------------A partir deste ponto são funções não verificadas--------------

    public function indexAdicionarAlbum($bandaId)
    {
    $banda = Banda::find($bandaId);

    return view('albuns.adicionarAlbum', compact('banda'));
    }

    public function adicionarAlbumView()
    {
        return view('albuns.album');
    }

    public function adicionarAlbum()
    {
        return view('albuns.adicionarAlbum');
    }

    public function postAdicionarAlbum(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'data_lancamento' => 'required|date',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/albums', $filename);
        }

        // Create a new Album instance
        $album = new Album();
        $album->nome = $request->nome;
        $album->data_lancamento = $request->data_lancamento;
        $album->imagem = $filename;
        $album->save();

        return redirect('/albums')->with('message', 'Album adicionado com sucesso!');
    }
}

