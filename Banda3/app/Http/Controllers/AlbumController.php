<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\User;
use App\Models\Banda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AlbumController extends Controller
{
    public function album()
    {
        return view('albuns.album');
    }

    public function index($id)
    {
        $banda = DB::table('bandas')
        ->where('id', $id)
        ->first();

        $albuns = DB::table('albuns')
        ->where('banda_id', $id)
        ->select('albuns.*')
        ->get();

        return view('albuns.album', compact('albuns', 'banda')); // Passa a var $albuns para a view

    }

    public function listarBandas()
    {
        $todasbandas = Banda::all(); // Retrieve all bandas from the database
        return $todasbandas;
    }



   /* public function editarAlbum()
    {
        // Add your logic here to retrieve and process data for the view
        $albuns = Album::all(); // Retrieve all albums from the database

        return view('albuns.editarAlbum', compact('albuns'));
    }*/

    //!------------------------A partir deste ponto são funções não verificadas--------------




}

