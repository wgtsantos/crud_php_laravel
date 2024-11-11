@extends('layouts.login')

@section('content')
    <h2>Editar Usuário</h2>

    <form action="{{ route('dashboard.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $user->nome }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div>
            <label for="contato">Contato:</label>
            <input type="text" id="contato" name="contato" value="{{ $user->contato }}" required>
        </div>

        <div>
            <label for="senha">Nova Senha (deixe em branco para não alterar):</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="foto">Foto:</label>
            @if ($user->foto)
                <img src="{{ asset('storage/' . $user->foto) }}" width="50" alt="Foto Atual">
            @endif
            <input type="file" id="foto" name="foto">
        </div>

        <button type="submit">Salvar Alterações</button>
    </form>
    <p> <a href="{{ route('dashboard.user'); }}" class="btn btn-primary">Voltar</a> </p>
@endsection
