<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associado extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula', 'nome_completo', 'data_nascimento', 'cpf',
        'telefone', 'email', 'endereco', 'data_filiacao',
        'categoria', 'foto', 'status', 'token_validacao'
    ];

    protected $casts = [
        'data_nascimento' => 'date',
        'data_filiacao' => 'date',
    ];
}
