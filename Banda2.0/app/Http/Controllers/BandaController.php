<?php

namespace App\Http\Controllers;

use App\Models\Banda;
use Illuminate\Http\Request;

class BandaController extends Controller
{
    public function index()
    {
        $bandas = Banda::all();
        return view('bandas.index', compact('bandas'));
    }

    public function create()
    {
        return view('bandas.create');
    }

    public function store(Request $request)
    {
        // Lógica para salvar uma nova banda
    }

    public function edit(Banda $banda)
    {
        return view('bandas.edit', compact('banda'));
    }

    public function update(Request $request, Banda $banda)
    {
        // Lógica para atualizar uma banda existente
    }

    public function destroy(Banda $banda)
    {
        // Lógica para excluir uma banda
    }
}
