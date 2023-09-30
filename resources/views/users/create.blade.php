<x-layout title="Novo usuário">
    <form method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="John Doe">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="******">
        </div>
        <button class="btn btn-primary">Registrar</button>
        <a href="{{ route('login') }}" class="btn btn-secondary">Voltar</a>
    </form>
</x-layout>
