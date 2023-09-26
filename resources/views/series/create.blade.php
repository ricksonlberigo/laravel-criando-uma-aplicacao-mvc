<x-layout title="Nova Série">
    <form method="POST" action="{{ route('series.store') }}">
        @csrf
        <div class="row mb-3">
            <div class="col-8">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="name" name="nome" autofocus
                    value="{{ old('nome') }}" />
            </div>
            <div class="col-2">
                <label for="seasonsQty" class="form-label">Número de Temporadas:</label>
                <input type="text" class="form-control" id="seasonsQty" name="seasonsQty" autofocus
                    value="{{ old('seasonsQty') }}" />
            </div>
            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Eps / Temporada:</label>
                <input type="text" class="form-control" id="episodesPerSeason" name="episodesPerSeason" autofocus
                    value="{{ old('episodesPerSeason') }}" />
            </div>
        </div>

        <div class="inputs">
            <button class="btn btn-primary">Adicionar</button>
            <a href="{{ route('series.index') }}" class="btn btn-secondary">Volar</a>
        </div>
    </form>
</x-layout>
