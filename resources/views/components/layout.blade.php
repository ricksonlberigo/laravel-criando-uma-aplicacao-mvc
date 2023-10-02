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
        <div class="container ">

            <div class="d-flex justify-content-between align-items-center">
                <h1>{{ $title }}</h1>

                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-primary text-white">
                            <i class="fa-solid fa-right-from-bracket"></i> Sair
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary text-white">Entrar</a>
                @endguest
            </div>

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
