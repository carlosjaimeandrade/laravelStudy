<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - LARAVEL 1</title>
</head>

<body>
    <header>
        <a href="{{route('logout')}}">Sair</a>
        <h1>Header</h1>
    </header>
    <hr>
    <section>
        @yield('content')
    </section>
    <hr>
    <footer>
        rodape
    </footer>
</body>

</html>
