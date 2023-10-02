<x-layout title="Lista de Séries" :success-message="$successMessage">
    @auth
        <a href="{{ route('series.create') }}" class="mb-4 btn btn-primary">Adicionar</a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex align-items-center justify-content-between">
                @auth
                    <a href="{{ route('seasons.index', $serie->id) }}">
                    @endauth
                    {{ $serie->nome }}
                    @auth
                    </a>
                @endauth
                @auth
                    <div class="d-flex align-items-center justify-content-between gap-1">
                        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fa-solid fa-edit"></i>
                        </a>


                        <form action="{{ route('series.destroy', $serie->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                @endauth
            </li>
        @endforeach
    </ul>
</x-layout>
