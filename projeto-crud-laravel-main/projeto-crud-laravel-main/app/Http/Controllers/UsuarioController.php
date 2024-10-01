<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Exibir todos os usuários
    public function index()
    {
        $usuarios = Usuario::all(); // Recupera todos os usuários do banco de dados
        return view('usuarios.index', compact('usuarios'));
    }

    // Mostrar o formulário para criar um novo usuário
    public function create()
    {
        return view('usuarios.create');
    }

    // Armazenar um novo usuário no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'telefone' => 'required|string|max:15',
            'cpf' => 'required|string|max:14|unique:usuarios,cpf',
            'endereco' => 'required|string|max:255',
            'tipo_usuario' => 'required|string|in:aluno,professor',
            'password' => 'required|string|min:8', // Validação da senha
        ]);

        Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cpf' => $request->cpf,
            'endereco' => $request->endereco,
            'tipo_usuario' => $request->tipo_usuario,
            'password' => bcrypt($request->password), // Criptografa a senha
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    // Mostrar o formulário para editar um usuário existente
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id); // Encontra o usuário pelo ID
        return view('usuarios.edit', compact('usuario'));
    }

    // Atualizar um usuário existente no banco de dados
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id); // Encontra o usuário pelo ID

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            'telefone' => 'required|string|max:15',
            'cpf' => 'required|string|max:14|unique:usuarios,cpf,' . $usuario->id,
            'endereco' => 'required|string|max:255',
            'tipo_usuario' => 'required|string|in:aluno,professor',
            'password' => 'nullable|string|min:8', // A senha é opcional na atualização
        ]);

        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->telefone = $request->telefone;
        $usuario->cpf = $request->cpf;
        $usuario->endereco = $request->endereco;
        $usuario->tipo_usuario = $request->tipo_usuario;

        // Atualiza a senha somente se for preenchida
        if ($request->filled('password')) {
            $usuario->password = bcrypt($request->password); // Criptografa a nova senha
        }

        $usuario->save(); // Salva as alterações no banco de dados

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    // Deletar um usuário existente
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id); // Encontra o usuário pelo ID
        $usuario->delete(); // Deleta o usuário

        return redirect()->route('usuarios.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
