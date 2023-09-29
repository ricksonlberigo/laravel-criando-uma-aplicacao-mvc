<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e52263f0c5.js" crossorigin="anonymous"></script>
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

        @isset($successMessage)
            <div class="alert alert-success">
                {{ $successMessage }}
            </div>
        @endisset

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        {{ $slot }}
    </div>
</body>

</html>
