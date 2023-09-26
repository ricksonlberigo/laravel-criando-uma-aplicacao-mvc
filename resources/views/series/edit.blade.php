<x-layout title="Editar Série: '{!! $series->nome !!}'">
    <form method="POST" action="{{ route('series.update', $series->id) }}">
        @csrf

        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="nome" autofocus value="{{ $series->nome }}" />
        </div>

        <div class="inputs">
            <button class="btn btn-primary">Adicionar</button>
            <a href="{{ route('series.index') }}" class="btn btn-secondary">Volar</a>
        </div>
    </form>
</x-layout>
