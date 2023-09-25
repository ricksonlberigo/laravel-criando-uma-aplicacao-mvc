<x-layout title="Lista de Séries">
    <a href="{{ route('series.create') }}" class="mb-4 btn btn-primary">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex align-items-center justify-content-between">
                {{ $serie->nome }}
                <div class="d-flex align-items-center justify-content-between gap-1">
                    <form action="{{ route('series.destroy', $serie->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="fa-solid fa-edit"></i>
                    </button>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
