@extends('layouts.app')

@section('title', 'Cadastrar Novo Usuário')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Cadastrar Novo Usuário</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="{{ old('telefone') }}" required>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ old('cpf') }}" required>
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco') }}" required>
            </div>
            <div class="mb-3">
                <label for="tipo_usuario" class="form-label">Tipo de Usuário:</label>
                <select class="form-select" id="tipo_usuario" name="tipo_usuario" required>
                    <option value="" disabled selected>Selecione o tipo de usuário</option>
                    <option value="aluno">Aluno</option>
                    <option value="professor">Professor</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
