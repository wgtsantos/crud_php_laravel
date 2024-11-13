@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
    <div class="bg-light p-4 rounded shadow-sm">
        <h2 class="text-center mb-4">Editar Usuário</h2>

        <form action="{{ route('dashboard.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Campo Nome -->
            <div class="mb-3">
                <label for="nome" class="form-label fw-bold text-dark">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ $user->nome }}" class="form-control" required>
            </div>

            <!-- Campo Email -->
            <div class="mb-3">
                <label for="email" class="form-label fw-bold text-dark">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>

            <!-- Campo Contato -->
            <div class="mb-3">
                <label for="contato" class="form-label fw-bold text-dark">Contato:</label>
                <input type="text" id="contato" name="contato" value="{{ $user->contato }}" class="form-control" required>
            </div>

            <!-- Campo Nova Senha -->
            <div class="mb-3">
                <label for="password" class="form-label fw-bold text-dark">Nova Senha (deixe em branco para não alterar):</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>

            <!-- Campo Foto -->
            <div class="mb-3">
                <label for="foto" class="form-label fw-bold text-dark">Foto:</label>
                @if ($user->foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $user->foto) }}" width="80" class="rounded-circle" alt="Foto Atual">
                    </div>
                @endif
                <input type="file" id="foto" name="foto" class="form-control">
            </div>

            <!-- Botões -->
            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="{{ route('dashboard.user') }}" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-success">Salvar Alterações</button>
            </div>
        </form>
    </div>
@endsection
