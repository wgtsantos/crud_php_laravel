@extends('layouts.app')

@section('content')
    <header>
    <h2>Bem-vindo, Administrador: {{ Auth::user()->nome }}</h2>
        <p>Gerencie os usuários aqui.</p>
    </header>
    <p>
    @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Sair</button>
        </form>
    @endauth
    </p>
    <h1>Lista de Usuários</h1>
    <a href="{{ route('dashboard.create') }}">Adicionar Usuário</a>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Contato</th>
                <th>Foto</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->nome }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->contato }}</td>
                    <td><img src="{{ asset('storage/' . $user->foto) }}" width="50" alt="Foto"></td>
                    <td>
                        <a href="{{ route('dashboard.edit_admin', $user->id) }}">Editar</a>
                        <form action="{{ route('dashboard.destroy', $user->id) }}" method="POST" data-confirm="Tem certeza que deseja excluir este usuário?" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
