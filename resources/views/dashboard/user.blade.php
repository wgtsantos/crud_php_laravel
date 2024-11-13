@extends('layouts.app')

@section('title', 'Meu Perfil')

@section('content')
    <div class="profile-container bg-light p-4 rounded shadow-sm">
        <div class="text-center">
            <!-- Foto do Usuário -->
            @if (Auth::user()->foto)
                <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto de {{ Auth::user()->nome }}" class="rounded-circle profile-photo mb-3">
            @else
                <div class="profile-placeholder rounded-circle mb-3">
                    <span class="text-light">Foto</span>
                </div>
            @endif

            <!-- Nome do Usuário -->
            <h2 class="text-dark">{{ Auth::user()->nome }}</h2>
            <p class="text-muted">Bem-vindo ao seu painel pessoal!</p>

            <!-- Botões -->
            <div class="d-flex justify-content-center gap-3 mt-3">
                <a href="{{ route('dashboard.edit_user', Auth::id()) }}" class="btn btn-primary btn-sm">Atualizar Dados</a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Sair</button>
                </form>
            </div>
        </div>

        <!-- Informações do Usuário -->
        <div class="user-details mt-4">
            <h4 class="text-dark">Informações do Perfil</h4>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Email:</strong> {{ Auth::user()->email }}
                </li>
                <li class="list-group-item">
                    <strong>Contato:</strong> {{ Auth::user()->contato }}
                </li>
                <li class="list-group-item">
                    <strong>Tipo de Acesso:</strong> {{ Auth::user()->acesso === 'admin' ? 'Administrador' : 'Usuário' }}
                </li>
            </ul>
        </div>
    </div>
@endsection
