<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller {

    public function index() {
        $users = User::all();
        return view('dashboard.index', compact('users'));
    }

    public function userComun() {
        return view('dashboard.user');
    }

    public function cadastrar() {
        return view('dashboard.cadastrar');
    }

    public function create() {
        return view('dashboard.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contato' => 'required|string|max:15',
            'password' => 'required|string|min:6',
            'acesso' => 'nullable|string|in:user,admin', // Validação opcional para acesso
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        $data['password'] = bcrypt($data['password']);

        User::create($data);

       // return redirect()->route('dashboard.index');

        // Diferenciar entre registro e criação por um administrador
        if ($request->is('registrar')) {
            // Caso seja registro, redirecionar para login com mensagem de sucesso
            return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso! Faça login.');
        } else {
            // Caso seja criação de usuário por admin, redirecionar para o índice
            return redirect()->route('dashboard.index')->with('success', 'Usuário criado com sucesso!');
        }
    }

    public function editAdmin($id) {

        $user = User::findOrFail($id);
        return view('dashboard.edit_admin', compact('user'));
    }

    public function editUser($id) {
        $user = User::findOrFail($id);

        // Verifica se o usuário está tentando editar seus próprios dados
        if ($user->id !== Auth::id()) {
            abort(403, 'Acesso negado.');
    }

        return view('dashboard.edit_user', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'contato' => 'required|string|max:15',
            'password' => 'nullable|string|min:6',
            'acesso' => 'nullable|string|in:user,admin', // Validação opcional para acesso
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Atualizar a foto se uma nova for enviada
        if ($request->hasFile('foto')) {
            // Apagar a foto antiga, se existir
            if ($user->foto && Storage::disk('public')->exists($user->foto)) {
                Storage::disk('public')->delete($user->foto);
            }
            // Salvar a nova foto
            $data['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        // Atualizar a senha, se fornecida
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        // return redirect()->route('dashboard.index');

        // Diferenciar entre alteração por um administrador ou usuário
        if (Auth::user()->acesso === 'admin') {
            // Caso seja um administrador, redirecionar para o índice do dashboard admin
            return redirect()->route('dashboard.index')->with('success', 'Usuário alterado com sucesso!');
        } else {
            // Caso seja um usuário comum, redirecionar para o painel do usuário
            return redirect()->route('dashboard.user')->with('success', 'Seus dados foram alterados com sucesso!');
        }
    }

    public function destroy($id) {
        $user = User::findOrFail($id);

        // Apagar a foto do usuário se existir
        if ($user->foto && Storage::disk('public')->exists($user->foto)) {
            Storage::disk('public')->delete($user->foto);
        }

        $user->delete();

        return redirect()->route('dashboard.index');
    }

}
