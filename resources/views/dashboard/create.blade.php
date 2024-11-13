@extends('layouts.app')

@section('title', 'Adicionar Novo Usuário')

@section('content')
    <h2 class="text-center mb-4">Adicionar Novo Usuário</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
        @csrf

        <!-- Campo Nome -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>

        <!-- Campo Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <!-- Campo Contato -->
        <div class="mb-3">
            <label for="contato" class="form-label">Contato:</label>
            <input type="text" id="contato" name="contato" class="form-control" required>
        </div>

        <!-- Campo Senha -->
        <div class="mb-3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <!-- Campo Tipo de Acesso -->
        <div class="mb-3">
            <label for="acesso" class="form-label">Tipo de Acesso:</label>
            <select id="acesso" name="acesso" class="form-select" required>
                <option value="" disabled selected>--Selecione--</option>
                <option value="user">Usuário</option>
                <option value="admin">Administrador</option>
            </select>
        </div>

        <!-- Campo Foto -->
        <div class="mb-3">
            <label for="foto" class="form-label">Foto:</label>
            <input type="file" id="foto" name="foto" class="form-control">
        </div>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
@endsection
