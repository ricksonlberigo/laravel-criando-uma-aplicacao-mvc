<form method="POST" action="{{ $action }}">
    @csrf

    @isset($nome)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <label for="name" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="name" name="nome" autofocus
            @isset($nome)
            value="{{ $nome }}"
            @endisset>
    </div>

    <div class="inputs">
        <button class="btn btn-primary">Adicionar</button>
        <a href="{{ route('series.index') }}" class="btn btn-secondary">Volar</a>
    </div>
</form>
