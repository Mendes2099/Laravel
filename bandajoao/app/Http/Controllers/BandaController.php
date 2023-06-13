<?php

namespace App\Http\Controllers;

use App\Models\Banda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BandaController extends Controller
{
    /**
     * Exibe uma lista de bandas.
     */
    public function index()
    {
        $bandas = Banda::all();

        return view('bandas.index', compact('bandas'));
    }

    /**
     * Exibe o formulário para criar uma nova banda.
     */
    public function create()
    {
        return view('bandas.create');
    }

    /**
     * Armazena uma nova banda no banco de dados.
     */
    public function store(Request $request)
    {
        // Valida os dados de entrada
        $request->validate([
            'nome' => 'required',
            'foto' => 'required|image',
            'numero_albuns' => 'required|integer',
        ]);

        // Cria uma nova instância de banda
        $banda = new Banda();
        $banda->nome = $request->input('nome');
        // Salva a foto no armazenamento e armazena o caminho da foto no banco de dados
        $caminhoFoto = $request->file('foto')->store('fotos_banda');
        $banda->foto = $caminhoFoto;
        $banda->numero_albuns = $request->input('numero_albuns');
        $banda->save();

        return redirect()->route('bandas.index')->with('success', 'Banda criada com sucesso.');
    }

    /**
     * Exibe a banda específica.
     */
    public function show(Banda $banda)
    {
        return view('bandas.show', compact('banda'));
    }

    /**
     * Exibe o formulário para editar a banda específica.
     */
    public function edit(Banda $banda)
    {
        return view('bandas.edit', compact('banda'));
    }

    /**
     * Atualiza a banda específica no banco de dados.
     */
    public function update(Request $request, Banda $banda)
    {
        // Valida os dados de entrada
        $request->validate([
            'nome' => 'required',
            'foto' => 'image',
            'numero_albuns' => 'required|integer',
        ]);

        $banda->nome = $request->input('nome');

        if ($request->hasFile('foto')) {
            // Exclui a foto antiga
            Storage::delete($banda->foto);

            // Salva a nova foto no armazenamento e atualiza o caminho da foto no banco de dados
            $caminhoFoto = $request->file('foto')->store('fotos_banda');
            $banda->foto = $caminhoFoto;
        }

        $banda->numero_albuns = $request->input('numero_albuns');
        $banda->save();

        return redirect()->route('bandas.index')->with('success', 'Banda atualizada com sucesso.');
    }

    /**
     * Remove a banda específica do banco de dados.
     */
    public function destroy(Banda $banda)
    {
        // Exclui a foto da banda do armazenamento
        Storage::delete($banda->foto);

        // Exclui a banda do banco de dados
        $banda->delete();

        return redirect()->route('bandas.index')->with('success', 'Banda excluída com sucesso.');
    }
}
