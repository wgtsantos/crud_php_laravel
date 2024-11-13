<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Página Inicial')</title>
    <!-- Link para o Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Link para o CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <!-- Logo ou Título -->
                    <a class="navbar-brand" href="#">CRUD Laravel</a>

                    <!-- Botão Sanduíche -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Links do Menu -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            @guest
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link fw-bold">LOGIN</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.cadastrar') }}" class="nav-link fw-bold">CADASTRAR</a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main class="container my-5">
        @yield('content')
    </main>
    <footer class="text-center mt-5 py-3 bg-dark text-white">
        <p>&copy; {{ date('Y') }} CRUD Laravel por Wellington Santos</p>
    </footer>
    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
