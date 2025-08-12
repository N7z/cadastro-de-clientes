<!doctype html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{ config('app.name') }}</title>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    >
</head>
<body>
    <main class="container">
        <nav>
            <ul>
                <li><strong>{{ config('app.name') }}</strong></li>
            </ul>
            <ul>
                <li><a href="{{ url('clientes') }}">Listar Clientes</a></li>
                <li><a href="{{ url('clientes/create') }}">Novo Cliente</a></li>
            </ul>
        </nav>

        @if(session()->get('flash_message'))
            <article>{{ session()->get('flash_message') }}</article>
        @endif

        <div>
            @yield('content')
        </div>

        <footer>Desenvolvido por Paulo &copy; {{ date('Y') }}</footer>
    </main>
</body>
</html>
