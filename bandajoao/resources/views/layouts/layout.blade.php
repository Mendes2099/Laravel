<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandas do Johnny</title>
    <style>
        /* Estilos CSS básicos */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            display: inline-block;
            margin-right: 10px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 5px;
        }
        main {
            padding: 20px;
        }
        footer {
            background-color: #f5f5f5;
            padding: 10px;
            text-align: center;
        }
    </style>
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
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} Bandas do Johnny. Todos os direitos reservados.
    </footer>
</body>
</html>

