<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Pessoa</title>
    <script>
        
        async function carregarEstados() {
            const response = await fetch('/estados');
            const estados = await response.json();
            const estadoSelect = document.getElementById('estado');

            estados.forEach(estado => {
                const option = document.createElement('option');
                option.value = estado.id; 
                option.textContent = estado.nome; 
                estadoSelect.appendChild(option);
            });
        }

        
        async function carregarEstados() {
    const response = await fetch('/estados');
    const estados = await response.json(); 
    const estadoSelect = document.getElementById('estado');

    estados.forEach(estado => {
        const option = document.createElement('option');
        option.value = estado.id;
        option.textContent = estado.nome; 
        estadoSelect.appendChild(option);
    });
}


 
        window.onload = carregarEstados;
    </script>
</head>
<body>
    <h1>Cadastrar Pessoa</h1>
    <form action="{{ route('pessoas.store') }}" method="POST">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label>CPF:</label>
        <input type="text" name="cpf" required>
        <br>
        <label>Data de Nascimento:</label>
        <input type="date" name="data_nascimento" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Telefone:</label>
        <input type="text" name="telefone" required>
        <br>
        <label>Logradouro:</label>
        <input type="text" name="logradouro" required>
        <br>
        <label>Estado:</label>
        <select name="estado" id="estado" onchange="carregarCidades()" required>
            <option value="">Selecione um estado</option>
        </select>
        <br>
        <label>Cidade:</label>
        <select name="cidade" id="cidade" required>
            <option value="">Selecione uma cidade</option>
        </select>
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
@extends('layouts.app')

@section('content')
<h1>Cadastrar Pessoa</h1>
<form action="{{ route('pessoas.store') }}" method="POST" class="p-4 border rounded">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Estado:</label>
        <select name="estado" id="estado" class="form-select" onchange="carregarCidades()" required>
            <option value="">Selecione um estado</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Cidade:</label>
        <select name="cidade" id="cidade" class="form-select" required>
            <option value="">Selecione uma cidade</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
@endsection
