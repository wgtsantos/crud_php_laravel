<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CRUD com Laravel')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <!-- Conteúdo da Página -->
        <main>
            @yield('content')
        </main>

        <footer>
            <p>&copy; {{ date('Y') }} CRUD com Laravel por Wellington Santos </p>
        </footer>
    </div>
</body>
<script src="{{ asset('js/delete.js') }}"></script>
</html>
