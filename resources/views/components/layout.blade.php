<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>{{ $title }} - Controle de Séries</title>
</head>

<body>
    <header class="bg-dark py-3 text-white">
        <div class="container">
            <h1>{{ $title }}</h1>
        </div>
    </header>

    <div class="container mt-3">
        {{ $slot }}
    </div>
</body>

</html>
