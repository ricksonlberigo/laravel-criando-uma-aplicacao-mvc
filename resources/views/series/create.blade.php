<x-layout title="Nova Série">
    <form method="POST" action="/series/save">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" autofocus>
        </div>

        <div class="inputs">
            <button class="btn btn-primary">Adicionar</button>
            <a href="/series" class="btn btn-secondary">Volar</a>
        </div>
    </form>
</x-layout>
