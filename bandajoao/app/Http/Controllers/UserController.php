<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Função que defie a página principal do sistema
    public function index()
    {
        return view('general.home');
    }

    /**
     * Exibe uma lista de usuários.
     */
    public function example()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Exibe o formulário para criar um novo usuário.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Armazena um novo usuário no banco de dados.
     */
    public function store(Request $request)
    {
        // Valida os dados de entrada
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        // Cria uma nova instância de usuário
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso.');
    }

    /**
     * Exibe o usuário específico.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Exibe o formulário para editar o usuário específico.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Atualiza o usuário específico no banco de dados.
     */
    public function update(Request $request, User $user)
    {
        // Valida os dados de entrada
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'role' => 'required',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    /**
     * Remove o usuário específico do banco de dados.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso.');
    }
}
