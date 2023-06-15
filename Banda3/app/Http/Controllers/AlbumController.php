<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Banda; // Importação do modelo Banda

class AlbumController extends Controller
{
    public function album()
    {
        return view('albuns.album');
    }

    public function index($id)
    {
        $albuns = DB::table('albuns')
        ->where('banda_id', $id)->get();

        // Recupera a banda com base no ID fornecido
        if (!$albuns) {
            // Caso a banda não exista, você pode redirecionar para uma página de erro ou fazer o tratamento adequado.
            abort(404, 'Banda não encontrada');
        }
        // Recupera todos os álbuns da banda
        return view('albuns.album', compact('albuns'));
    }
}
