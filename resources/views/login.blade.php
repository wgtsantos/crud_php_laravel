@extends('layouts.login')

@section('content')
    <h2 class="text-center mb-4">Login</h2>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <!-- Campo de Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <!-- Campo de Senha -->
        <div class="mb-3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <!-- Botão de Login -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">ENTRAR</button>
        </div>
    </form>

    <!-- Mensagem de Erro -->
    @if (session('error'))
        <p class="mt-3 text-danger text-center">{{ session('error') }}</p>
    @endif

    <!-- Link para Cadastro -->
    <p class="mt-4 text-center">
        Não tem uma conta? <a href="{{ route('dashboard.cadastrar') }}" class="text-link">Cadastre-se aqui</a>.
    </p>
@endsection
