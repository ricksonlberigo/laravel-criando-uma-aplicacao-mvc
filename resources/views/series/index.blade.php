<x-layout title="Séries">
    <a href="/series/create" class="mb-4 btn btn-primary">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie }}</li>
        @endforeach
    </ul>
</x-layout>
