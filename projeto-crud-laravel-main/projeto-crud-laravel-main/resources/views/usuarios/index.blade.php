@extends('layouts.app')

@section('title', 'Lista de Usuários')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Usuários Cadastrados</h3>
        <a href="{{ route('usuarios.create') }}" class="btn btn-success">Cadastrar Novo Usuário</a>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                    <th>Endereço</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nome }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->telefone }}</td>
                        <td>{{ $usuario->cpf }}</td>
                        <td>{{ $usuario->endereco }}</td>
                        <td>{{ ucfirst($usuario->tipo_usuario) }}</td>
                        <td class="d-flex">
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este usuário?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
