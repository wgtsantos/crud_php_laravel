@extends('layouts.home')

@section('title', 'Página Inicial')

@section('content')
    <h2 class="text-center mb-4">Usuários Cadastrados</h2>

    @if($users->isEmpty())
        <p class="text-center text-muted">Nenhum usuário cadastrado.</p>
    @else
        <div class="row g-4">
            @foreach($users as $user)
                <div class="col-md-4 col-sm-6">
                    <div class="card shadow-sm">
                        @if ($user->foto)
                            <img src="{{ asset('storage/' . $user->foto) }}" class="card-img-top img-fluid" alt="Foto de {{ $user->nome }}">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" class="card-img-top img-fluid" alt="Foto Padrão">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $user->nome }}</h5>
                            <p class="card-text">
                                <strong>Acesso:</strong> {{ $user->acesso === 'admin' ? 'Administrador' : 'Usuário' }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
