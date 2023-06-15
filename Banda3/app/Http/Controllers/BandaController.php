<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banda;


class BandaController extends Controller
{

    public function index()
    {
        $bandas = Banda::all(); // Retrieve all bandas from the database
        return view('general.home', compact('bandas')); // Pass the $bandas variable to the view
    }

    // Método responsável por exibir o formulário de adicionar banda
    public function adicionarBanda()
    {
        return view('bandas.adicionarBanda');
    }

    // Método responsável por processar o formulário de adicionar banda
    public function postAdicionarBanda(Request $request)
    {

        // Validação dos campos do formulário
        $request->validate([
            'nome' => 'required|string',
            'foto' => 'nullable|image',
            'numero_albuns' => 'required|integer',
        ]);


        // Criar uma nova instância de Banda com os dados do formulário
        $banda = new Banda();

        $banda->nome = $request->input('nome');
        $banda->numero_albuns = $request->input('numero_albuns');

        // Verificar se foi enviada uma foto e salvá-la
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $path = $foto->store('bandas', 'public');
            $banda->foto = $path;
        }

        // Salvar a banda no banco de dados
        $banda->save();

        // Redirecionar para a página de bandas com uma mensagem de sucesso
        return redirect()->route('adicionar-banda')->with('message', 'Banda adicionada com sucesso! 🚀');
    }
}
