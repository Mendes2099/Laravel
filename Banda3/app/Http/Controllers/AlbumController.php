<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function album(){
        return view('albuns.album');
     }

     public function index()
     {
         $albuns = Album::all(); // Retrieve all Albuns from the database
         return view('general.album', compact('Albuns')); // Pass the $bandas variable to the view
     }


    //! Terá que ser adicionada uma blade para ver os albuns já que para editar já existe

    // As funções de adicionar albuns devem ser semelhantes ás do controller BandaController mas com atributos diferentes
    // (Migration dos albuns) -> database\migrations\2023_06_13_224007_create_albuns_table.php

    // Método responsável por exibir a view dos Album
    public function adicionarAlbumView()
    {
        return view('albuns.album');
    }

    // Método responsável por exibir o formulário de adicionar Album
    public function adicionarAlbum()
    {
        return view('albuns.adicionarAlbum');
    }

    // Método responsável por processar o formulário de adicionar banda


}
