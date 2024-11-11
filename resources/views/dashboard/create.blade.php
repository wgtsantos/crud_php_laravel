@extends('layouts.app')

@section('content')
    <h2>Adicionar Novo Usuário</h2>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="senha">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="role">Tipo de Acesso:</label>
            <select id="acesso" name="acesso" required>
                <option value="">--Selecione--</option>
                <option value="user">Usuário</option>
                <option value="admin">Administrador</option>
            </select>
        </div>

        <div>
            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto">
        </div>

        <button type="submit">Salvar</button>
    </form>
    <p> <a href="{{ route('dashboard.index'); }}" class="btn btn-primary">Voltar</a> </p>
@endsection
