<x-layout title="Lista de Séries">
    <a href="{{ route('series.create') }}" class="mb-4 btn btn-primary">Adicionar</a>

    @isset($successMessage)
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex align-items-center justify-content-between">
                {{ $serie->nome }}
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
            </li>
        @endforeach
    </ul>
</x-layout>
