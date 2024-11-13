@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
    <h2 class="text-center mb-4">Editar Usuário</h2>

    <form action="{{ route('dashboard.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <!-- Campo Nome -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $user->nome }}" class="form-control" required>
        </div>

        <!-- Campo Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" required>
        </div>

        <!-- Campo Contato -->
        <div class="mb-3">
            <label for="contato" class="form-label">Contato:</label>
            <input type="text" id="contato" name="contato" value="{{ $user->contato }}" class="form-control" required>
        </div>

        <!-- Campo Nova Senha -->
        <div class="mb-3">
            <label for="password" class="form-label">Nova Senha (deixe em branco para não alterar):</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>

        <!-- Campo Tipo de Acesso -->
        <div class="mb-3">
            <label for="acesso" class="form-label">Tipo de Acesso:</label>
            <select id="acesso" name="acesso" class="form-select" required>
                <option value="" disabled>--Selecione--</option>
                <option value="user" {{ $user->acesso === 'user' ? 'selected' : '' }}>Usuário</option>
                <option value="admin" {{ $user->acesso === 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
        </div>

        <!-- Campo Foto -->
        <div class="mb-3">
            <label for="foto" class="form-label">Foto:</label>
            @if ($user->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $user->foto) }}" width="80" class="rounded-circle" alt="Foto Atual">
                </div>
            @endif
            <input type="file" id="foto" name="foto" class="form-control">
        </div>
        
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </div>
    </form>
@endsection
