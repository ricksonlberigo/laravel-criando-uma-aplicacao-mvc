<x-layout title="Episódios" :success-message="$successMessage">

    <form method="POST">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    Episódio {{ $episode->number }}

                    <div class="form-check">
                        <input class="form-check-input" name="episodes[]" type="checkbox" value="{{ $episode->id }}"
                            @if ($episode->watched) checked @endif>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="input my-3">
            <button class="btn btn-primary">Salvar</button>
            <a href="{{ route('series.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</x-layout>
