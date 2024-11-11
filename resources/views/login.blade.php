@extends('layouts.login')

@section('content')
    <h2>Login</h2>

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Entrar</button>
    </form>

    @if (session('error'))
        <p style="color: #F00;">{{ session('error') }}</p>
    @endif

    <p>Não tem uma conta? <a href="{{ route('dashboard.cadastrar') }}">Cadastre-se aqui</a>.</p>
@endsection
