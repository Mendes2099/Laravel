<?php

namespace App\Http\Controllers;

use App\Models\Banda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BandaController extends Controller
{

    public function index()
    {
        $bandas = Banda::all(); // Retrieve all bandas from the database
        return view('general.home', compact('bandas')); // Pass the $bandas variable to the view
    }

    public function bandas()
    {
        $bandas = DB::table('bandas') // Retrieve all bandas from the database
        ->get();

        foreach ($bandas as $item){
            $item->numero_albuns = $this->numeroAlbuns($item->id);
        }

        return view('bandas.bandas', compact('bandas')); // Pass the $bandas variable to the view
    }

    public function numeroAlbuns($id){
        $albuns = DB::table('albuns')
        ->where('banda_id', $id)
        ->select('albuns.*')
        ->get();

        return count($albuns);
    }

    //*---------------------------------------

    // Método responsável por exibir o formulário de adicionar banda

}
