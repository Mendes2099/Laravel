<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function album()
    {
        return view('albuns.album');
    }

    public function index()
    {
        $albuns = Album::all(); // Retrieve all Albuns from the database
        return view('albuns.album', compact('albuns')); // Pass the $albuns variable to the view
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

