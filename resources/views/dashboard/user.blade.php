@extends('layouts.login')

@section('content')
    @auth
        <h1>Bem-vindo, {{ Auth::user()->nome }}</h1>
        <p>Este é o seu painel.</p>
        
        {{-- Exibir a foto do usuário --}}
        <div>
            @if (Auth::user()->foto)
                <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto de {{ Auth::user()->nome }}" width="150">
            @else
                <p>Você ainda não adicionou uma foto.</p>
            @endif
        </div>
        
        {{-- Botão para editar os dados do usuário --}}
        <div>
            <a href="{{ route('dashboard.edit_user', Auth::id()) }}" class="btn btn-primary">Atualizar Meus Dados</a>
        </div>

        {{-- Formulário de logout --}}
        <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <button type="submit" class="btn btn-danger">Sair</button>
        </form>
    @endauth
@endsection


