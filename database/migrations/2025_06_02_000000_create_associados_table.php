<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('associados', function (Blueprint $table) {
            $table->id();
            $table->string('matricula')->unique();
            $table->string('nome_completo');
            $table->date('data_nascimento');
            $table->string('cpf')->unique();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->text('endereco')->nullable();
            $table->date('data_filiacao');
            $table->enum('categoria', ['CONTRIBUINTE', 'BENFEITOR', 'FUNDADOR']);
            $table->string('foto')->nullable();
            $table->enum('status', ['Ativo', 'Pendente', 'Inativo'])->default('Pendente');
            $table->string('token_validacao', 64)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('associados');
    }
};
