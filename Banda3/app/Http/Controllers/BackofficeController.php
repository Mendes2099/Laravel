<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Banda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackofficeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function backoffice(){
        $bandas = Banda::all();
        $albuns = Album::all();
        return view('dashboard.backoffice', compact('bandas', 'albuns'));
    }

    public function apagarBanda($id){
        DB::table('albuns')
        ->where('banda_id', $id)
        ->delete();

        DB::table('bandas')
        ->where('id', $id)
        ->delete();

        return back();
    }

    public function apagarAlbum($id){
        DB::table('albuns')
        ->where('id', $id)
        ->delete();

        return back();
    }
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
            'foto' => 'nullable|image'
        ]);


        // Criar uma nova instância de Banda com os dados do formulário
        $banda = new Banda();

        $banda->nome = $request->input('nome');
            // Obter o número atual de álbuns da banda

        // Verificar se foi enviada uma foto e salvá-la
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $path = $foto->store('bandas', 'public');
            $banda->foto = $path;
        }

        // Salvar a banda no banco de dados
        $banda->save();

        // Redirecionar para a página de bandas com uma mensagem de sucesso
        return redirect()->route('adicionar-banda')->with('message', 'Banda adicionada com sucesso! 🎸');
    }


    public function editarBanda($id){

        $banda = DB::table('bandas')
        ->where('id', $id)
        ->first();

        return view('bandas.editarBanda', compact('banda'));
    }


    public function atualizarBanda(Request $request){
        $request->validate([
            'nome' => 'required',
            'foto' => 'nullable|image',
        ]);

        $banda = Banda::find($request->id);

        if (!$banda) {
            return redirect()->route('backoffice')->with('message', 'Banda não encontrada.');
        }

        $banda->nome = $request->nome;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $path = $foto->store('bandas', 'public');
            $banda->foto = $path;
        }

        $banda->save();

        return redirect()->route('backoffice')->with('message', 'Banda atualizada com sucesso! 🎸');

    }

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
        $todasbandas = Banda::all(); // Retrieve all bandas from the database
         // Pass the $bandas variable to the view
        return view('albuns.adicionarAlbum', compact('todasbandas'));
    }

    public function postAdicionarAlbum(Request $request)
    {
        $request->validate([
            'banda_id' => 'required',
            'nome' => 'required|string',
            'data_lancamento' => 'required',
            'imagem' => 'nullable'
        ]);


        // Criar uma nova instância de Banda com os dados do formulário
        $albuns = new Album();

        $albuns->banda_id = $request->input('banda_id');
        $albuns->nome = $request->input('nome');
        $albuns->data_lancamento = $request->input('data_lancamento');


        // Verificar se foi enviada uma foto e salvá-la
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $path = $imagem->store('albums', 'public');
            $albuns->imagem = $path;
        }

        //dd($request);

        // Salvar a banda no banco de dados
        $albuns->save();

        return redirect('/album')->with('message', 'Album adicionado com sucesso! 💽');
    }




    public function editarAlbum($id){

        $album = DB::table('albuns')
        ->where('id', $id)
        ->first();

        return view('albuns.editarAlbum', compact('album'));
    }


    public function atualizarAlbum(Request $request){
        $request->validate([
            'nome' => 'required',
            'data_lancamento' => 'required',
            'imagem' => 'nullable|image',
        ]);

        $album = Album::find($request->id);

        if (!$album) {
            return redirect()->route('backoffice')->with('message', 'Album não encontrada.');
        }

        $album->nome = $request->nome;
        $album->data_lancamento = $request->data_lancamento;

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $path = $imagem->store('albums', 'public');
            $album->imagem = $path;
        }

        $album->save();

        return redirect()->route('backoffice')->with('message', 'Album atualizada com sucesso! 💽');

    }


}
