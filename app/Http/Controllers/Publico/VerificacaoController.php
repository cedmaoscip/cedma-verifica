<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Associado;
use Illuminate\Http\Request;

class VerificacaoController extends Controller
{
    public function verificar(Request $request)
    {
        $token = $request->input('token');

        $associado = Associado::where('token_validacao', $token)->first();

        if (!$associado) {
            return response()->json([
                'status' => 'Inativo',
                'nome' => null,
                'matricula' => null,
                'mensagem' => 'Registro não localizado ou associado desligado.'
            ]);
        }

        $mensagem = match($associado->status) {
            'Ativo' => 'Associado regular cadastrado e quite com suas obrigações. Acesso autorizado.',
            'Pendente' => 'Associado cadastrado, porém com restrições. Favor procurar o setor administrativo.',
            default => 'Situação irregular.'
        };

        return response()->json([
            'status' => $associado->status,
            'nome' => $associado->nome_completo,
            'matricula' => $associado->matricula,
            'mensagem' => $mensagem
        ]);
    }
}
