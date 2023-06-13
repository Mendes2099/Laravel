<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandas do Johnny</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Início</a></li>
                <li><a href="#">Bandas</a></li>
                <li><a href="#">Álbuns</a></li>
                <li><a href="#">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>
        &copy; {{ date('Y') }} Bandas do Johnny. Todos os direitos reservados.
    </footer>
</body>
</html>


