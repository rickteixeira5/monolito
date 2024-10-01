<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('nome'); // Campo nome (texto)
            $table->string('email')->unique(); // Campo email (único)
            $table->string('telefone'); // Campo telefone (texto)
            $table->string('cpf')->unique(); // Campo CPF (único)
            $table->string('endereco'); // Campo endereço (texto)
            $table->enum('tipo_usuario', ['aluno', 'professor']); // Campo para diferenciar aluno e professor
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
