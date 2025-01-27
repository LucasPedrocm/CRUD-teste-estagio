<!DOCTYPE html>
<html>
<head>
    <title>Lista de Pessoas</title>
</head>
<body>
    <h1>Lista de Pessoas</h1>
    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <a href="{{ route('pessoas.create') }}">Cadastrar Nova Pessoa</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pessoas as $pessoa)
                <tr>
                    <td>{{ $pessoa->id }}</td>
                    <td>{{ $pessoa->nome }}</td>
                    <td>{{ $pessoa->cpf }}</td>
                    <td>{{ $pessoa->email }}</td>
                    <td>
                        <a href="{{ route('pessoas.show', $pessoa->id) }}">Ver</a>
                        <a href="{{ route('pessoas.edit', $pessoa->id) }}">Editar</a>
                        <form action="{{ route('pessoas.destroy', $pessoa->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<form method="GET" action="{{ route('pessoas.index') }}" class="mb-3">
    <input type="text" name="search" class="form-control" placeholder="Buscar por nome ou CPF">
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pessoas as $pessoa)
            <tr>
                <td>{{ $pessoa->id }}</td>
                <td>{{ $pessoa->nome }}</td>
                <td>{{ $pessoa->cpf }}</td>
                <td>{{ $pessoa->email }}</td>
                <td>
                    <a href="{{ route('pessoas.show', $pessoa->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('pessoas.edit', $pessoa->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('pessoas.destroy', $pessoa->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $pessoas->links() }} 
