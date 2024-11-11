@extends('layouts.login')

@section('content')
    <h2>Cadastro</h2>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('dashboard.registrar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="contato">Contato:</label>
            <input type="text" id="contato" name="contato" required>
        </div>

        <div>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto">
        </div>

        <button type="submit">Cadastrar</button>
    </form>

    <p>Já tem uma conta? <a href="{{ route('login') }}">Faça login aqui</a>.</p>
@endsection
