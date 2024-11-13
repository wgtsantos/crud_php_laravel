@extends('layouts.app')

@section('title', 'Lista de Usuários')

@section('content')
<header class="mb-4">
    <h2 class="text-center">Bem-vindo, Administrador: {{ Auth::user()->nome }}</h2>
    <p class="text-center">Gerencie os usuários aqui.</p>
</header>

<div class="text-center mb-4">
    <a href="{{ route('dashboard.create') }}" class="btn btn-success">Adicionar Usuário</a>
</div>

<h1 class="mb-4 text-center">Lista de Usuários</h1>

@if ($users->isEmpty())
    <p class="text-center text-muted">Nenhum usuário cadastrado.</p>
@else
    <table class="table table-hover table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Contato</th>
                <th>Foto</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->nome }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->contato }}</td>
                    <td class="text-center">
                        <img src="{{ asset('storage/' . $user->foto) }}" width="50" class="rounded-circle" alt="Foto de {{ $user->nome }}">
                    </td>
                    <td class="text-center">
                        <a href="{{ route('dashboard.edit_admin', $user->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('dashboard.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
