<!DOCTYPE html>
<html>
<head>
    <title>Editar Pessoa</title>
</head>
<body>
    <h1>Editar Pessoa</h1>
    <form action="{{ route('pessoas.update', $pessoa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nome:</label>
        <input type="text" name="nome" value="{{ $pessoa->nome }}" required>
        <br>
        <label>CPF:</label>
        <input type="text" name="cpf" value="{{ $pessoa->cpf }}" required>
        <br>
        <label>Data de Nascimento:</label>
        <input type="date" name="data_nascimento" value="{{ $pessoa->data_nascimento }}" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $pessoa->email }}" required>
        <br>
        <label>Telefone:</label>
        <input type="text" name="telefone" value="{{ $pessoa->telefone }}" required>
        <br>
        <label>Logradouro:</label>
        <input type="text" name="logradouro" value="{{ $pessoa->logradouro }}" required>
        <br>
        <label>Cidade:</label>
        <input type="text" name="cidade" value="{{ $pessoa->cidade }}" required>
        <br>
        <label>Estado:</label>
        <input type="text" name="estado" value="{{ $pessoa->estado }}" required>
        <br>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
