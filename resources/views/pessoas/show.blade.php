<!DOCTYPE html>
<html>
<head>
    <title>Detalhes da Pessoa</title>
</head>
<body>
    <h1>Detalhes da Pessoa</h1>
    <p><strong>Nome:</strong> {{ $pessoa->nome }}</p>
    <p><strong>CPF:</strong> {{ $pessoa->cpf }}</p>
    <p><strong>Data de Nascimento:</strong> {{ $pessoa->data_nascimento }}</p>
    <p><strong>Email:</strong> {{ $pessoa->email }}</p>
    <p><strong>Telefone:</strong> {{ $pessoa->telefone }}</p>
    <p><strong>Logradouro:</strong> {{ $pessoa->logradouro }}</p>
    <p><strong>Cidade:</strong> {{ $pessoa->cidade }}</p>
    <p><strong>Estado:</strong> {{ $pessoa->estado }}</p>
    <a href="{{ route('pessoas.index') }}">Voltar</a>
</body>
</html>
