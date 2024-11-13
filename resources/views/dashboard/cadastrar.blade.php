@extends('layouts.login')

@section('content')
    <h2 class="text-center mb-4">Novo Cadastro</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.registrar') }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm cadastro-form">
        @csrf

        <!-- Campo Nome -->
        <div class="mb-3">
            <label for="nome" class="form-label fw-bold text-dark">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>

        <!-- Campo Email -->
        <div class="mb-3">
            <label for="email" class="form-label fw-bold text-dark">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <!-- Campo Contato -->
        <div class="mb-3">
            <label for="contato" class="form-label fw-bold text-dark">Contato:</label>
            <input type="text" id="contato" name="contato" class="form-control" required>
        </div>

        <!-- Campo Senha -->
        <div class="mb-3">
            <label for="password" class="form-label fw-bold text-dark">Senha:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <!-- Campo Foto -->
        <div class="mb-3">
            <label for="foto" class="form-label fw-bold text-dark">Foto (opcional):</label>
            <input type="file" id="foto" name="foto" class="form-control">
        </div>

        <!-- Botão de Cadastrar -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>

    <p class="mt-4 text-center">
        Já tem uma conta? <a href="{{ route('login') }}" class="text-link">Faça login aqui</a>.
    </p>
@endsection
