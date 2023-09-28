<x-layout title="Temporadas de {!! $series->nome !!}">
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex align-items-center justify-content-between">
                <a href="{{ route('episodes.index', $season->id) }}">Temporada {{ $season->number }}</a>
                <span class="badge text-bg-secondary">
                    {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('series.index') }}" class="my-3 btn btn-secondary">Voltar</a>
</x-layout>
